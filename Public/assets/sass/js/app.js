const createDiv = n => document.createElement(n);
const _ 		= n => document.querySelector(n);
const __ 		= n => document.querySelectorAll(n);
const elSelect	= (el,n) => el.querySelector(n);
const elSelectAll = (el,n) => el.querySelectorAll(n);
const Debug 	= (comment, vars) => console.log(comment,vars);
const [local]		= window.location.pathname.split("/").filter(n => n !== "");
const ajax 		=  async (url, dataObject, cb) => {
	url = window.location.origin + "/" + local + '/' + url;
	if (window.fetch) {
		const response = await fetch(url,dataObject);
		const result  = await response.text();
		cb && cb(result);
		return result && result;
	    // exécuter ma requête fetch ici
	} else {
	    var xhr = getHttpRequest();
		const method = (dataObject.method) ? dataObject.method : "POST";
		xhr.onreadystatechange = data => cb(data);
		xhr.open(method, url, true);
		xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		xhr.send(dataObject.data);
	}
};

function debounce(callback, delay){
    var timer;
    return function(){
        var args = arguments;
        var context = this;
        clearTimeout(timer);
        timer = setTimeout(function(){
            callback.apply(context, args);
        }, delay)
    }
}
