export default class Animations {
    constructor() {
        this.hidden = document.querySelectorAll('.hidden')
        this.obServeImg()
    }

    obServeImg() {
        const observer = new IntersectionObserver(this.animateImg);
        for (const hidden of this.hidden) {
            observer.observe(hidden);
        }
    }

    animateImg(entries) {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add('show');
            }else{
                entry.target.classList.remove('show');
            }
        })
    }


}


