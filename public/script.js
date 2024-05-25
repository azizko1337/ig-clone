const URL = "http://localhost/ig-clone/public/";

// Elements
const toggleThemeBtn = document.querySelector('.header__theme-button');
const storiesContent = document.querySelector('.stories__content');
const storiesLeftButton = document.querySelector('.stories__left-button');
const storiesRightButton = document.querySelector('.stories__right-button');
const posts = document.querySelectorAll('.post');
const postsContent = document.querySelectorAll('.post__content');

// ===================================
// DARK/LIGHT THEME
// Set initial theme from LocalStorage
document.onload = setInitialTheme(localStorage.getItem('theme'));
function setInitialTheme(themeKey) {
  if (themeKey === 'dark') {
    document.documentElement.classList.add('darkTheme');
  } else {
    document.documentElement.classList.remove('darkTheme');
  }
}

// Toggle theme button
toggleThemeBtn.addEventListener('click', () => {
  // Toggle root class
  document.documentElement.classList.toggle('darkTheme');

  // Saving current theme on LocalStorage
  if (document.documentElement.classList.contains('darkTheme')) {
    localStorage.setItem('theme', 'dark');
  } else {
    localStorage.setItem('theme', 'light');
  }
});

// ===================================
// STORIES SCROLL BUTTONS
// Scrolling stories content



//
//
//
//
//

async function likePost(postId){
  const res = await fetch(`${URL}like?post_id=${postId}`);
  const data = await res.json();
  console.log(data);

  document.getElementById(`${postId}likes`).innerText = data?.likes || 0;
  document.getElementById(`${postId}comments`).innerText = data?.comments || 0;

  if(data.liked){
    document.getElementById(`${postId}likeimg`).src = `${URL}assets/icons/heart-filled.png`;
  }else{
    document.getElementById(`${postId}likeimg`).src = `${URL}assets/icons/heart.png`;
  }
}