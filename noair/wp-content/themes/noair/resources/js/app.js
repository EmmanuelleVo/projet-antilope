import BurgerMenu from "./parts/BurgerMenu";
import JsEnabled from "./parts/JsEnabled";
import Tab from "./parts/Tab";
import Animations from "./parts/Animations";

class DW_Controller
{
    constructor() {
        // A ce stade-ci, le DOM n'est pas encore prêt car on est dans le <head>
        // Permet d'instancier les classes utilitaires par exemple

    }

    run() {
        // Désormais, le DOM est prêt, on peut commencer à manipuler
        // Permet d'instancier les classes de composants d'interface par exemple

        //this.resizeCanvas()
        //this.addEventListeners()

        this.jsEnabled = new JsEnabled()
        this.animations = new Animations()
        this.burgerMenu = new BurgerMenu()
        this.tab = new Tab()

    }



}
window.dw = new DW_Controller()
window.addEventListener('load', () => {
    window.dw.run()
})