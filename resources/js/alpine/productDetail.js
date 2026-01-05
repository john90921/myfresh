document.addEventListener('alpine:init', () => {
    Alpine.data('lessonForm', () => ({
        open: false,
        toggle() {
            this.open = !this.open
        }
    }))
})
