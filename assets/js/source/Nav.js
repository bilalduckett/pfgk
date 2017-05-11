/*jshint esversion: 6 */

// Set variables
const myNavbar = document.getElementById("myHeader");

function toggleClass(){
	document.getElementById("myMenu").classList.toggle('is-active');
	myNavbar.classList.toggle("menu-reveal");
}

// const headroom = new Headroom(myNavbar, {
// 	offset: 205,
// 	tolerance: 5,
// 	classes: {
// 		initial : "header",
// 		pinned : "header--pinned",
// 		unpinned : "header--unpinned"
// 	}
// });
//
// headroom.init();