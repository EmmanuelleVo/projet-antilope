export default class BurgerMenu {
    static get selector() {
        return '.burger-js'
    }
    constructor() {
        this.menu = document.querySelector('.menu-js')
        this.burger = document.querySelector('.burger-js')

        this.burger.addEventListener('click', (e)=>{
            this.toggleMenu()
        })
    }
    toggleMenu(){
        if(!this.menu.classList.contains('active__menu')){
            this.menu.classList.add('active__menu')
            this.element.classList.add('burger-active')
        } else {
            this.menu.classList.remove('active__menu')
            this.element.classList.remove('burger-active')
        }
    }
}