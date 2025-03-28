// array of image file names
var pics = [ "image1.jpg", "image2.jpg",
            "image3.jpg", "image4.jpg" ];

// array of corresponding Image objects
var slides = [];

// current slide number index
var index = 0;

// load an image from file, return Image object
function loadImage(url)
{
  url = 'URL OF YOUR IMAGE DIRECTORY ON THE WEB SERVER' + url;
  result = new Image();
  result.src = url;
  return result;
}

// preload all images from pics array,
// into corresponding positions of slides array
function loadSlides()
{
  // var i;
  for (var i = 0; i < pics.length; i++)
  {
    slides.push(loadImage(pics[i]));
  }
  // display first slide
  index = 0;
  changeSlide();
}

// change slide that appears in display area
function changeSlide()
{
  document.getElementById('display').src = slides[index].src;
}
