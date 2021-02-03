
const background = window.document.getElementById('body')
const colorNow = localStorage.getItem('color')

const loginTitle = window.document.getElementById('login')
const loginTitleColor = localStorage.getItem('loginColor')

const cards = window.document.getElementsByClassName('card')
const cardColor = localStorage.getItem('cardColor')
  
const cardBody = window.document.getElementsByClassName('card-body')
const cardBodyColor = localStorage.getItem('cardBodyColor')
  
const listItem = window.document.getElementsByClassName('list-group-item')
const listItemColor = localStorage.getItem('listItemColor')
  

function color() {
    if(colorNow == 'bg-light') {
        // Background
        background.classList.add('bg-light')
        
        // Cards
        for(i = 0; i < cards.length; i++) {
            cards[i].classList.add('bg-white')
        }
        
        // Card-Body
        for(i = 0; i < cardBody.length; i++) {
            cardBody[i].classList.add('text-dark')
        }

        // List-Item-Group
        for(i = 0; i < listItem.length; i++) {
            listItem[i].classList.add('bg-light')
        }

    } else {  
        // Background      
        background.classList.add('bg-secondary')

        // Cards
        for(i = 0; i < cards.length; i++) {
            cards[i].classList.add('bg-dark')
        }   

        // Card-Body
        for(i = 0; i < cardBody.length; i++) {
            cardBody[i].classList.add('text-white')
        }          
        
        // List-Item-Group
        for(i = 0; i < listItem.length; i++) {
            listItem[i].classList.add('bg-dark')
        }
    }   
}


function setColor() {
    if(colorNow == 'bg-light') {
        // Background
        background.classList.remove('bg-light')
        background.classList.add('bg-secondary')
        localStorage.setItem('color', 'bg-secondary')

        // Cards
        for(i = 0; i < cards.length; i++) {
            cards[i].classList.remove('white')
            cards[i].classList.add('bg-dark')
        
            cardBody[i].classList.remove('text-white')
            cardBody[i].classList.add('text-white')
        }          
        localStorage.setItem('cardColor', 'bg-dark')   
        localStorage.setItem('cardBodyColor', 'text-white')

        // List bg
        for(i = 0; i < listItem.length; i++) {
            
            listItem[i].classList.remove('bg-white')
            listItem[i].classList.add('bg-dark')
            
        }          
        listItem.setItem('listItemColor','bg-dark')



        document.location.reload()
    } else {    
        // Background 
        background.classList.remove('bg-secondary')
        background.classList.add('bg-light')
        localStorage.setItem('color', 'bg-light')
        
        // Cards
        for(i = 0; i < cards.length; i++) {
            cards[i].classList.remove('dark')
            cards[i].classList.remove('text-dark')

            cardBody[i].classList.add('bg-white')
            cardBody[i].classList.add('text-dark')
        }          
        localStorage.setItem('cardColor', 'bg-white')
        localStorage.setItem('cardBodyColor', 'text-dark')

        // List bg
        for(i = 0; i < listItem.length; i++) {
            
            listItem[i].classList.remove('bg-dark')
            listItem[i].classList.add('bg-white')
            
        }          
        listItem.setItem('listItemColor','bg-white')


        document.location.reload()
    }    
}
