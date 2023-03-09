// CSS SELECTORS
const SCB = ".SearchCategoriesBar";
const CONTAINER = ".categoriesWrapper";
const ITEM = CONTAINER+' li';
const LEFT = $('#left_scroll');
const RIGHT = $('#right_scroll');

// CONSTANTS
const N_ITEMS = $(ITEM).length;
const ITEM_WIDTH = $(ITEM).outerWidth() + 10;
const SCB_WIDTH = $(SCB).width();
const CONTAINER_WIDTH = (N_ITEMS+1)*ITEM_WIDTH;
const OFFSET = parseInt(SCB_WIDTH / ITEM_WIDTH);
const N_PAGES = ((SCB_WIDTH>CONTAINER_WIDTH) ? 0 : Math.round(Number(CONTAINER_WIDTH / SCB_WIDTH)));
const SPEED= 600;
const SPEED_ARROW= 300;

// VARIABLES
var page = 0;
var scrolling= false;
var left_scrolled = 0;



$(document).ready(function() {
  
  // DEBUGGIN ----------------------------------------------------
  $(".s_width").text(SCB_WIDTH);
  $(".c_width").text(CONTAINER_WIDTH);
  $(".i_width").text(ITEM_WIDTH);
  $(".i_count").text(N_ITEMS);
  $(".offset").text(OFFSET);
  $(".last_page").text(N_PAGES);
  // /DEBUGGIN ---------------------------------------------------

  LEFT.hide(0);
  if(N_PAGES == 0) RIGHT.hide(0);
  $(CONTAINER).css('width', CONTAINER_WIDTH+"px"); 
  RIGHT.click(function() {scroll("right");});
  LEFT.click(function() { scroll("left");});
});
                          
function scroll(direction) {
  var mult = ((direction == 'right') ? 1 : -1);
  if(scrolling || (page<=0 && mult<0) || (page>=N_PAGES && mult>0)) {return;}
  scrolling = true;
  manageArrows(page);
  
  // DEBUGGIN ----------------------------------------------------
  $(".page").text(page);
  // /DEBUGGIN ---------------------------------------------------

  left_scrolled += parseInt(ITEM_WIDTH * OFFSET * mult);
  $(SCB).animate({scrollLeft: left_scrolled}, 800);
  scrolling = false;
}

$(SCB).scroll(function() {
  var scrolled = $(SCB).scrollLeft();
  if(scrolled > CONTAINER_WIDTH - (ITEM_WIDTH * (OFFSET+1))) {
    page = N_PAGES;
  } else {
    page = parseInt(scrolled / (ITEM_WIDTH * OFFSET));
  }
  manageArrows(page);
  
  // DEBUGGIN ----------------------------------------------------
  $(".scrolled").text(scrolled);
  $(".page").text(page);
  // /DEBUGGIN ---------------------------------------------------
});

function manageArrows(page) {
  if(page<=0) {                 // limite sinistro
    LEFT.hide(SPEED_ARROW);
    RIGHT.show(SPEED_ARROW);
  } else if(page>=N_PAGES) {    // limite destro
    LEFT.show(SPEED_ARROW);
    RIGHT.hide(SPEED_ARROW);
  } else {                      // in mezzo
    LEFT.show(SPEED_ARROW);
    RIGHT.show(SPEED_ARROW);
  }
}
