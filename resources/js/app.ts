import './bootstrap';

interface toastDetail {
    message: string;
    type: string;
    icon: string;
}

$(function () {
    window.addEventListener('livewire:toast', event => {
        let detail: toastDetail = event.detail
        toast(detail.message, detail.type, detail.icon);
    })
})


function toast(
    message: string,
    type: string = 'info',
    icon: string = 'fa fa-info-circle',
) {
    One.helpers('jq-notify', {type: type, icon: icon, message: message});
}
