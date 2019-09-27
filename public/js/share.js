
const url = document.location.host;

if (document.location.pathname === "/products") {
  let popover = document.querySelectorAll('#showPopover');
  let arrayAllPops = Array.from(popover);

  arrayAllPops.forEach(function (pop) {

    let titlePop = pop.parentElement.parentElement.parentElement.previousElementSibling.previousElementSibling.innerText
    let urlPop = pop.parentElement.parentElement.parentElement.previousElementSibling.previousElementSibling.firstChild.nextElementSibling.getAttribute("href");

    let face =  "<a href='https://www.facebook.com/sharer/sharer.php?u="        + url + urlPop + "&t="      + titlePop + "' target='_blank' title='Share on Facebook'><i class='fab fa-facebook fa-fw'></i></a>"
    let linke = "<a href='https://www.linkedin.com/shareArticle?mini=true&url=" + url + urlPop + "&title="  + titlePop + "' target='_blank' title='Share on Linkedin'><i class='fab fa-linkedin fa-fw'></i></a>"
    let whats = "<a href='https://api.whatsapp.com/send?text="                  + url + urlPop +  "' target='_blank' data-action='share/whatsapp/share'><i class='fab fa-whatsapp-square fa-fw'></i></a>"


    $('[data-toggle="popover"]').popover({
      container: 'body',
      html: true,
      placement: 'top',
      sanitize: false,
      content:
      `<div id="PopoverContent">
        <div class="social-links-demo">`
        + face
        + linke
        + whats
        +
        `</div>
      </div>`
    })
  });

}else {
  let pop = document.querySelector('#showPopover');
  let titlePop = pop.parentElement.parentElement.parentElement.previousElementSibling.previousElementSibling.innerText
  let urlPop = document.location;
  let face =  "<a href='https://www.facebook.com/sharer/sharer.php?u="        + urlPop + "&t="      + titlePop + "' target='_blank' title='Share on Facebook'><i class='fab fa-facebook fa-fw'></i></a>"
  let linke = "<a href='https://www.linkedin.com/shareArticle?mini=true&url=" + urlPop + "&title="  + titlePop + "' target='_blank' title='Share on Linkedin'><i class='fab fa-linkedin fa-fw'></i></a>"
  let whats = "<a href='https://api.whatsapp.com/send?text="                  + urlPop +  "' target='_blank' data-action='share/whatsapp/share'><i class='fab fa-whatsapp-square fa-fw'></i></a>"

  $('[data-toggle="popover"]').popover({
    container: 'body',
    html: true,
    placement: 'top',
    sanitize: false,
    content:
    `<div id="PopoverContent">
      <div class="social-links-demo">`
      + face
      + linke
      + whats
      +
      `</div>
    </div>`
  })
}
