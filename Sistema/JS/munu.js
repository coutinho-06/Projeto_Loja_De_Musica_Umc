class MobileNavbar {
    constructor(mobileMenu, nav) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.nav = document.querySelector(nav);
        this.activeClass = "active";

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.nav.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
    }

    init() {
        if (this.mobileMenu && this.nav) {
            this.mobileMenu.addEventListener("click", this.handleClick);
        }
        return this;
    }
}

const mobileNavbar = new MobileNavbar(".mobile-menu", "nav");
mobileNavbar.init();
