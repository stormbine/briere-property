VueScrollTo.setDefaults({
    offset: -80,
})

let pageapp = new Vue({
    el: '#page_wrap',
    data: {
        showNavbar: 0,
        navOpen: 0,
        currentReview: 0,
        activeTeamMember: 0,
        modalOpen: 0,
        siteModalOpen: 0,
        siteModalType: "",
    },
    methods: {
        toggleNav: function()
        {
            if(this.navOpen == 0)
            {
                this.navOpen = 1
            }
            else
            {
                this.navOpen = 0
            }
        },
        handleScroll: function(e)
        {
            if(window.scrollY < this.pageScrolled && window.scrollY > 100)
            {
                this.showNavbar = 1;
            }
            else
            {
                this.showNavbar = 0;
            }

            this.pageScrolled = window.scrollY
        },
        switchTestimonial: function(direction)
        {
            let totalItems = document.getElementById('testContainer').getAttribute('data-total-reviews')

            if(direction == "next")
            {
                if(this.currentReview < totalItems - 1)
                {
                    this.currentReview++
                    
                }
                else
                {
                    this.currentReview = 0
                }
            }
            else
            {
                if(this.currentReview != 0 )
                {
                    this.currentReview--
                }
                else
                {
                    this.currentReview = totalItems - 1
                }
            }
        },
        closeModal: function() {
            this.modalOpen = 0
            this.activeTeamMember = 0
        },
        showTeamMember: function(teamMember) {
            this.modalOpen = 1
            this.activeTeamMember = teamMember

            this.$scrollTo('.team-members')
            
        },
        closeSiteModal: function() {
            this.siteModalOpen = 0
            this.siteModalType = ""
        },
        showSiteModal: function(modalType) {
            window.scroll({
                top: 0, 
                left: 0, 
                behavior: 'smooth' 
            });
            this.siteModalOpen = 1

            timerid = setTimeout(() => {
                this.siteModalType = modalType
            }, 500)
        },
    },  
    created () {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    },
    mounted () {
        
    }
});