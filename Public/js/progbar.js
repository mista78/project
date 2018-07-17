progressBar = {
    countElmt: 0,
    loadedElmt: 0,

    config : {
        colors  : "#0073b7",
        height  : 4,
        opacity : 1
    },

    setOptions : function() {
        if (typeof options === 'object' &&
            Object.keys(options).length > 0)
        {
            for (var property in options)
            {
                if (typeof this.config[property] !== undefined)
                {
                    this.config[property] = options[property];
                }
            }
        }
    },
    init: function (opts) {
        var that = this;
        options = opts || {};
        this.setOptions();
        this.countElmt = $('img').length;

        // Construction et ajout progress bar
        var $progressBarContainer = $('<div/>').attr('id', 'progress-bar-container');
        $progressBarContainer.append($('<div/>').attr('id', 'progress-bar'));
        
        $progressBarContainer.appendTo($('body'));
        $("#progress-bar").css({
            "background"    : this.config.colors,
            "position"      : "absolute",
            "top"           : "0",
            "z-index"       : "1000",
            "height"        : this.config.height,
            "opacity"       : this.config.opacity
        })
        // Ajout container d'élements
        var $container = $('<div/>').attr('id', 'progress-bar-elements');
        $container.appendTo($('body'));

        $("#progress-bar-elements").css({
            "display" : "none",
        })

        // Parcours des éléments à prendre en compte pour le chargement
        $('img').each(function () {
            $('<img/>')
                .attr('src', $(this).attr('src'))
                .on('load error', function () {
                    that.loadedElmt++;
                    that.updateProgressBar();
                })
                .appendTo($container)
                ;
        });
    },

    updateProgressBar: function () {
        $('#progress-bar').stop().animate({
            'width': (progressBar.loadedElmt / progressBar.countElmt) * 100 + '%'
        }, function () {
            if (progressBar.loadedElmt == progressBar.countElmt) {
                setTimeout(function () {
                    $('#progress-bar-container').animate({
                        'top': '-8px'
                    }, function () {
                        $('#progress-bar-container').remove();
                        $('#progress-bar-elements').remove();
                    });
                }, 500);
            }
        });
    }
};

