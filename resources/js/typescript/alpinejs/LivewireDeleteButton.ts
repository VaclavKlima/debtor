export default () => ({
    className: null,
    id: null,
    permission: null,
    init() {
        let button = $(this.$root)

        this.className = button.attr('data-class')
        this.id = button.attr('data-id')
        this.permission = button.attr('data-permission')
    },
    async deleteModel(): Promise<void> {
        // @ts-ignore
        let e = await Swal.fire({
            text: 'Are you sure you want to delete this model?',
            icon: 'question',
            showDenyButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
        })

        if (e.isConfirmed === true) {
            // Livewire must use WithDeleteModelTrait
            this.$wire.delete(this.id, this.className, this.permission)
        }
    }
})


