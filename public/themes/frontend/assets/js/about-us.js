
//Swiper Teams About Us Page
const teamsInfo = new Swiper('.teams .teams-info', {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 60,
  speed: 1000,
}) || false;


//Event click teams Home Page
const itemsTeams = document.querySelectorAll('.teams .team-avatar-item')
if(itemsTeams) {
  Array.from(itemsTeams).forEach((item, index) => {
    item.addEventListener('click', () => {
      if ( item.classList.contains('active')) {
        return true
      }

      Array.from(itemsTeams).forEach((item) => {
        item.classList.remove('active')
      })
      
      item.classList.add('active')

      teamsInfo.slideTo(index)
    })
  })
}