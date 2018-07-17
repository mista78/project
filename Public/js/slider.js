var Carousel = (function() {
	var self = {},
		config = {
			slidesToScroll: 1,
			slidesVisible: 1,
			pagination: false,
			navigation: true,
			infinit: false,
			loop: false
		};

	setOptions = function() {
		if (typeof options === 'object' &&
			Object.keys(options).length > 0)
		{
			for (var property in options)
			{
				if (typeof config[property] !== undefined)
				{
					config[property] = options[property];
				}
			}
		}
	}

	self.init = function(element,opts) {
		options = opts || {};
		setOptions();
		self.element = element
		let children = [].slice.call(element.children)
		self.isMobile = false
		self.currentItem = 0
		self.offSet = 0


		self.root = createDivClass('carousel')
		self.container = createDivClass('carousel__container')
		self.root.setAttribute('tabindex','0')
		self.root.appendChild(self.container)
		self.element.appendChild(self.root)
		self.moveCallbacks = []
		self.items = children.map((child) => {
			let item = createDivClass('carousel__item')
			
			item.appendChild(child)
			return item
		})

		if (config.infinit) {
			self.offSet = config.slidesVisible + config.slidesToScroll
			self.items = [
				...self.items.slice(self.items.length - self.offSet).map(item => item.cloneNode(true)),
				...self.items,
				...self.items.slice(0,  self.offSet).map(item => item.cloneNode(true)),
			]
			gotoItem(self.offSet,false)
		}
		self.items.forEach(item => self.container.appendChild(item))
		setStyle()
		if (config.navigation) {
			createNav()
		}

		if (config.pagination) {
			createPage()
		}
		self.moveCallbacks.forEach(cb => cb(self.currentItem))
		windowResize()
		window.addEventListener('resize',windowResize)
		self.root.addEventListener('keyup',e => {
			if (e.key === 'ArrowRight') {
				next()
			} else if(e.key === 'ArrowLeft') {
				prev()
			}
		})

		if (config.infinit) {
			self.container.addEventListener('transitionend',resetinfinit)
		}
	}

	setStyle = () => {
		let ratio = self.items.length / getSlidesVisible()
		self.container.style.width = (ratio * 100) + "%"
		self.container.style.height = config.height ? config.height + 'px' :  (self.container.clientHeight + 30)  + "px"
		self.root.style.height = config.height ? config.height + 'px' :  (self.root.clientHeight + 30)  + "px"
		self.items.forEach(item => {
			item.style.width = (100 / getSlidesVisible()) / ratio + "%"
			item.firstChild.style.height = config.height ? config.height + 'px' :  (item.clientHeight + 30)  + "px"
		})
	}

	createNav = () => {
		let angleleft = createDivClass('fas fa-angle-left')
		let angleright = createDivClass('fas fa-angle-right')
		let nextButon = createDivClass('carousel__next')
		let prevButon = createDivClass('carousel__prev')
		nextButon.appendChild(angleright)
		prevButon.appendChild(angleleft)
		self.root.appendChild(nextButon)
		self.root.appendChild(prevButon)

		nextButon.addEventListener('click',next)
		prevButon.addEventListener('click',prev)
		if (config.loop === true) { return }
		onMove(index => {
			if (index === 0) {
				prevButon.classList.add('carousel__prev--hidden')
			} else {
				prevButon.classList.remove('carousel__prev--hidden')
			}
			if (self.items[self.currentItem + getSlidesVisible()] === undefined) {
				nextButon.classList.add('carousel__next--hidden')
			} else {
				nextButon.classList.remove('carousel__next--hidden')
			}
		})
	}


	createPage = () => {
		let pagination = createDivClass('carousel__pagination')
		let buttons = []
		self.root.appendChild(pagination)
		for(let i = 0; i < (self.items.length - 2 * self.offSet); i= i + config.slidesToScroll) {
			let button = createDivClass('carousel__pagination__button')
			button.addEventListener('click', () => gotoItem(i + self.offSet))
			pagination.appendChild(button)
			buttons.push(button)
		}
		onMove(index => {
			let count = self.items.length - 2 * self.offSet
			let actbut = buttons[Math.floor(((index - self.offSet) % count) / config.slidesToScroll)]
			if (actbut) {
				buttons.forEach(button => button.classList.remove("carousel__pagination__button--active"))
				actbut.classList.add('carousel__pagination__button--active')
			}
		})
	}

	next = () => {
		gotoItem(self.currentItem + getSlidesToScroll())
	}

	prev = () => {
		gotoItem(self.currentItem - getSlidesToScroll())
	}

	gotoItem = (index, animation = true) => {
		if (index < 0 ) {
			if (config.loop) {
				index = index = self.items.length - getSlidesVisible()
			} else {
				return
			}
		} else if (index >= self.items.length || (self.items[self.currentItem + getSlidesVisible()] === undefined && index > self.currentItem)) {
			if (config.loop) {
				index = 0
			} else {
				return
			}
		}
		let translateX = index * -100 / self.items.length
		if (animation === false) {
			self.container.style.transition = 'none'
		}
		self.container.style.transform = 'translate3d('+ translateX +'%,0,0)'
		self.container.offsetHeight
		if (animation === false) {
			self.container.style.transition = ''
		}
		self.currentItem = index
		self.moveCallbacks.forEach(cb => cb(index))
	}

	resetinfinit = () => {
		if (self.currentItem <= config.slidesToScroll) {
			gotoItem(self.currentItem + (self.items.length - 2 * self.offSet), false)
		} else if (self.currentItem >= self.items.length - self.offSet) {
			gotoItem(self.currentItem - (self.items.length - 2 * self.offSet), false)
		}
	}

	onMove = (cb) => {
		self.moveCallbacks.push(cb)
	} 

	windowResize = () => {
		let mobile = window.innerWidth < 800
		if (mobile !== self.isMobile) {
			self.isMobile = mobile
			setStyle()
			self.moveCallbacks.forEach(cb => cb(self.currentItem))
		}
	}


	createDivClass =  (classname) =>  {
		let div = document.createElement('div')
		div.setAttribute('class',classname)
		return div
	}

	getSlidesToScroll = () => {
		return self.isMobile ? 1 : config.slidesToScroll
	}

	getSlidesVisible = () => {
		return self.isMobile ? 1 : config.slidesVisible
	}

	return self;
})();
