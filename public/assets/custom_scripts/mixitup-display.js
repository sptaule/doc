let containerEl = document.querySelector('.container');
let mixer = mixitup(containerEl, {
    animation: {
        effects: 'fade scale stagger(60ms)'
    },
    load: {
        filter: 'none'
    }
});
containerEl.classList.add('mixitup-ready');
mixer.show()
.then(function() {
    mixer.configure({
        animation: {
            effects: 'fade scale'
        }
    });
});