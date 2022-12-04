import './bootstrap';


$(window).ready(function () {
    window.addEventListener('livewire:toast', event => {
        console.log(event)
    })
})


function toast(
    type: string = 'info',
    icon: string = 'fa fa-info-circle me-1',
    message: string
) {
    One.helpers('jq-notify', {type: 'info', icon: 'fa fa-info-circle me-1', message: 'Your message!'});
}

window.toast = toast
