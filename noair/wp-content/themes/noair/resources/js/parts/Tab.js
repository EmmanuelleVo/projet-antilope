export default class Tab {
    constructor() {
        this.tabLink = document.querySelectorAll('.tab__link')
        this.tabContent = document.querySelectorAll('.tab__content')
        this.tabBar = document.querySelector('.tab')
        this.tabContainer = document.querySelector('.single-product__tab')


        this.openTab()

    }


    openTab() {

        this.tabLink.forEach(tab => {
            tab.addEventListener('click', (e) => {
                this.tabNumber = tab.dataset.forTab
                this.tabToActivate = this.tabContainer.querySelector(`.tab__content[data-tab="${this.tabNumber}"]`)

                this.tabBar.querySelectorAll('.tab__link').forEach(link => {
                    link.classList.remove('tab__link--active')
                })

                this.tabContainer.querySelectorAll('.tab__content').forEach(content => {
                    content.classList.remove('tab__content--active')
                })

                tab.classList.add('tab__link--active')
                this.tabToActivate.classList.add('tab__content--active')

            })
        })
    }


}