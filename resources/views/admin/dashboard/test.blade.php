<div class="demo-btns">
		<header>
			<h1>Material Design modalss</h1>
		</header>

		<div class="info">
			<div class="buttons">
				<p>
					<a href="" data-modal="#modalclick" class="modalclick__trigger">modalclick 1</a>
					<a href="" data-modal="#modalclick2" class="modalclick__trigger">modalclick 2</a>
					<a href="" data-modal="#modalclick3" class="modalclick__trigger">modalclick 3</a>
				</p>
			</div>
			<p>Click a button to activate a modalclick.<br><a href="http://ettrics.com/code/material-design-modal/" target="_blank" class="link">Read the how-to on Ettrics.com</a></p>
		</div>
	</div>

	<!-- Modal -->
	<div id="modalclick" class="modalclick modalclick__bg" role="dialog" aria-hidden="true">
		<div class="modalclick__dialog">
			<div class="modalclick__content">
				<h1>modalclick</h1>
				<p>Church-key American Apparel trust fund, cardigan mlkshk small batch Godard mustache pickled bespoke meh seitan. Wes Anderson farm-to-table vegan, kitsch Carles 8-bit gastropub paleo YOLO jean shorts health goth lo-fi. Normcore chambray locavore Banksy, YOLO meditation master cleanse readymade Bushwick.</p>
				
				<!-- modalclick close button -->
				<a href="" class="modalclick__close demo-close">
					<svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
				</a>
				
			</div>
		</div>
	</div>

	<div id="modalclick2" class="modalclick modalclick--align-top modalclick__bg" role="dialog" aria-hidden="true">
		<div class="modalclick__dialog">
			<div class="modalclick__content">
				<h1>Big modalclick</h1>
				<h3>This modalclick is pretty tall.</h3>
				<p>Selfies normcore four dollar toast four loko listicle artisan. Hoodie Marfa authentic, wayfarers church-key tofu Banksy pop-up Kickstarter Brooklyn heirloom swag synth. Echo Park cray synth mixtape. Tofu gastropub squid readymade, trust fund Wes Anderson DIY PBR 8-bit try-hard +1 Shoreditch lo-fi tote bag.</p>
				<p><img src="http://unsplash.it/600/300" alt="" /></p>
				<p>Mumblecore cred selfies fingerstache. Tousled skateboard plaid lo-fi shabby chic salvia, swag Odd Future Etsy art party Austin cronut. Crucifix whatever Pinterest food truck, pickled viral cray 90's DIY chambray keffiyeh biodiesel Vice blog. Cred meh yr tofu.</p>
				<p>Mumblecore cred selfies fingerstache. Tousled skateboard plaid lo-fi shabby chic salvia, swag Odd Future Etsy art party Austin cronut. Crucifix whatever Pinterest food truck, pickled viral cray 90's DIY chambray keffiyeh biodiesel Vice blog. Cred meh yr tofu.</p>
				<!-- modalclick close button -->
				<a href="" class="modalclick__close demo-close">
					<svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
				</a>
			</div>
		</div>
	</div>

	<div id="modalclick3" class="modalclick modalclick__bg" role="dialog" aria-hidden="true">
		<div class="modalclick__dialog">
			<div class="modalclick__content">
				<h1>modalclick 3</h1>
				<p>Church-key American Apparel trust fund, cardigan mlkshk small batch Godard mustache pickled bespoke meh seitan. Wes Anderson farm-to-table vegan, kitsch Carles 8-bit gastropub paleo YOLO jean shorts health goth lo-fi.</p>
				
				<!-- modalclick close button -->
				<a href="" class="modalclick__close demo-close">
					<svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
				</a>
			</div>
		</div>
	</div>

	<!-- Ettrics -->
	<a href="http://ettrics.com/code/material-design-modal/" class="logo" target="_blank">
	 <img class="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/ettrics-logo.svg" alt="" /> 
    </a>
    












    * {
  box-sizing: border-box;
}
body {
  line-height: 1.5;
  font-family: 'Lato';
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}
h1,
h2,
h3,
p {
  font-weight: 300;
  margin: 0 0 2.4rem 0;
}
h1,
h2,
h3 {
  line-height: 1.3;
}
a {
  text-decoration: none;
  color: inherit;
  font-weight: 400;
}
/**
 * Material Modal CSS
 */
.modalclick {
  will-change: visibility, opacity;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow-y: auto;
  overflow-x: hidden;
  z-index: 1000;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  -webkit-transition-delay: $modalclick-delay;
          transition-delay: $modalclick-delay;
}
.modalclick--active {
  visibility: visible;
  opacity: 1;
}
.modalclick--align-top {
  -webkit-box-align: start;
          align-items: flex-start;
}
.modalclick__bg {
  background: transparent;
}
.modalclick__dialog {
  max-width: 600px;
  padding: 1.2rem;
}
.modalclick__content {
  will-change: transform, opacity;
  position: relative;
  padding: 2.4rem;
  background: #ffebee;
  background-clip: padding-box;
  box-shadow: 0 12px 15px 0 rgba(0,0,0,0.25);
  opacity: 0;
  -webkit-transition: all 0.25s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.25s cubic-bezier(0.23, 1, 0.32, 1);
}
.modalclick__content--active {
  opacity: 1;
}
.modalclick__close {
  z-index: 1100;
  cursor: pointer;
}
.modalclick__trigger {
  position: relative;
  display: inline-block;
  padding: 1.2rem 2.4rem;
  color: rgba(0,0,0,0.7);
  line-height: 1;
  cursor: pointer;
  background: #ffebee;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.26);
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.modalclick__trigger--active {
  z-index: 10;
}
.modalclick__trigger:hover {
  background: #e5d3d6;
}
#modalclick__temp {
  will-change: transform, opacity;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #ffebee;
  -webkit-transform: none;
          transform: none;
  opacity: 1;
  -webkit-transition: opacity 0.1s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: opacity 0.1s ease-out, -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: opacity 0.1s ease-out, transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: opacity 0.1s ease-out, transform 0.5s cubic-bezier(0.23, 1, 0.32, 1), -webkit-transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
/**
 * Demo specific CSS
 */
body {
  height: 100vh;
  background: #f44336;
}
img {
  max-width: 100%;
}
.demo-btns header {
  padding: 7vh 10vw;
  background: #ffebee;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
}
.demo-btns header h1 {
  margin: 0;
  color: rgba(0,0,0,0.54);
  font-weight: 300;
}
.demo-btns .info {
  background: #f44336;
  padding: 3vh 10vw;
  height: 70vh;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-flow: column wrap;
}
.demo-btns p {
  text-align: center;
  color: #fff;
}
.demo-btns .link {
  font-size: 20px;
}
.demo-btns .modalclick__trigger {
  margin-right: 3px;
}
@media (max-width: 640px) {
  .demo-btns .modalclick__trigger {
    margin-bottom: 0.8rem;
  }
}
.demo-close {
  position: absolute;
  top: 0;
  right: 0;
  margin: 1.2rem;
  padding: 0.6rem;
  background: rgba(0,0,0,0.3);
  border-radius: 50%;
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.demo-close svg {
  width: 24px;
  fill: #fff;
  pointer-events: none;
  vertical-align: top;
}
.demo-close:hover {
  background: rgba(0,0,0,0.6);
}
.logo {
  position: fixed;
  bottom: 3vh;
  right: 3vw;
  z-index: 2;
}
.logo img {
  width: 45px;
  -webkit-transform: rotate(0);
          transform: rotate(0);
  -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
  transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
.logo img:hover {
  -webkit-transform: rotate(180deg) scale(1.1);
          transform: rotate(180deg) scale(1.1);
}











var Modalclick = (function() {
	var trigger = $qsa(".modalclick__trigger"); // what you click to activate the modalclick
	var modalss = $qsa(".modalclick"); // the entire modalclick (takes up entire window)
	var modalssbg = $qsa(".modalclick__bg"); // the entire modalclick (takes up entire window)
	var content = $qsa(".modalclick__content"); // the inner content of the modalclick
	var closers = $qsa(".modalclick__close"); // an element used to close the modalclick
	var w = window;
	var isOpen = false;
	var contentDelay = 400; // duration after you click the button and wait for the content to show
	var len = trigger.length;

	// make it easier for yourself by not having to type as much to select an element
	function $qsa(el) {
		return document.querySelectorAll(el);
	}

	var getId = function(event) {
		event.preventDefault();
		var self = this;
		// get the value of the data-modalclick attribute from the button
		var modalclickId = self.dataset.modal;
		var len = modalclickId.length;
		// remove the '#' from the string
		var modalclickIdTrimmed = modalclickId.substring(1, len);
		// select the modalclick we want to activate
		var modalclick = document.getElementById(modalclickIdTrimmed);
		// execute function that creates the temporary expanding div
		makeDiv(self, modalclick);
	};

	var makeDiv = function(self, modalclick) {
		var fakediv = document.getElementById("modalclick__temp");

		/**
		 * if there isn't a 'fakediv', create one and append it to the button that was
		 * clicked. after that execute the function 'moveTrig' which handles the animations.
		 */

		if (fakediv === null) {
			var div = document.createElement("div");
			div.id = "modalclick__temp";
			self.appendChild(div);
			moveTrig(self, modalclick, div);
		}
	};

	var moveTrig = function(trig, modalclick, div) {
		var trigProps = trig.getBoundingClientRect();
		var m = modalclick;
		var mProps = m.querySelector(".modalclick__content").getBoundingClientRect();
		var transX, transY, scaleX, scaleY;
		var xc = w.innerWidth / 2;
		var yc = w.innerHeight / 2;

		// this class increases z-index value so the button goes overtop the other buttons
		trig.classList.add("modalclick__trigger--active");

		// these values are used for scale the temporary div to the same size as the modalclick
		scaleX = mProps.width / trigProps.width;
		scaleY = mProps.height / trigProps.height;

		scaleX = scaleX.toFixed(3); // round to 3 decimal places
		scaleY = scaleY.toFixed(3);

		// these values are used to move the button to the center of the window
		transX = Math.round(xc - trigProps.left - trigProps.width / 2);
		transY = Math.round(yc - trigProps.top - trigProps.height / 2);

		// if the modalclick is aligned to the top then move the button to the center-y of the modalclick instead of the window
		if (m.classList.contains("modalclick--align-top")) {
			transY = Math.round(
				mProps.height / 2 + mProps.top - trigProps.top - trigProps.height / 2
			);
		}

		// translate button to center of screen
		trig.style.transform = "translate(" + transX + "px, " + transY + "px)";
		trig.style.webkitTransform = "translate(" + transX + "px, " + transY + "px)";
		// expand temporary div to the same size as the modalclick
		div.style.transform = "scale(" + scaleX + "," + scaleY + ")";
		div.style.webkitTransform = "scale(" + scaleX + "," + scaleY + ")";

		window.setTimeout(function() {
			window.requestAnimationFrame(function() {
				open(m, div);
			});
		}, contentDelay);
	};

	var open = function(m, div) {
		if (!isOpen) {
			// select the content inside the modalclick
			var content = m.querySelector(".modalclick__content");
			// reveal the modalclick
			m.classList.add("modalclick--active");
			// reveal the modalclick content
			content.classList.add("modalclick__content--active");

			/**
			 * when the modalclick content is finished transitioning, fadeout the temporary
			 * expanding div so when the window resizes it isn't visible ( it doesn't
			 * move with the window).
			 */

			content.addEventListener("transitionend", hideDiv, false);

			isOpen = true;
		}

		function hideDiv() {
			// fadeout div so that it can't be seen when the window is resized
			div.style.opacity = "0";
			content.removeEventListener("transitionend", hideDiv, false);
		}
	};

	var close = function(event) {
		event.preventDefault();
		event.stopImmediatePropagation();

		var target = event.target;
		var div = document.getElementById("modalclick__temp");

		/**
		 * make sure the modalclick__bg or modalclick__close was clicked, we don't want to be able to click
		 * inside the modalclick and have it close.
		 */

		if (
			(isOpen && target.classList.contains("modalclick__bg")) ||
			target.classList.contains("modalclick__close")
		) {
			// make the hidden div visible again and remove the transforms so it scales back to its original size
			div.style.opacity = "1";
			div.removeAttribute("style");

			/**
			 * iterate through the modalclickss and modalclick contents and triggers to remove their active classes.
			 * remove the inline css from the trigger to move it back into its original position.
			 */

			for (var i = 0; i < len; i++) {
				modalss[i].classList.remove("modalclick--active");
				content[i].classList.remove("modalclick__content--active");
				trigger[i].style.transform = "none";
				trigger[i].style.webkitTransform = "none";
				trigger[i].classList.remove("modalclick__trigger--active");
			}

			// when the temporary div is opacity:1 again, we want to remove it from the dom
			div.addEventListener("transitionend", removeDiv, false);

			isOpen = false;
		}

		function removeDiv() {
			setTimeout(function() {
				window.requestAnimationFrame(function() {
					// remove the temp div from the dom with a slight delay so the animation looks good
					div.remove();
				});
			}, contentDelay - 50);
		}
	};

	var bindActions = function() {
		for (var i = 0; i < len; i++) {
			trigger[i].addEventListener("click", getId, false);
			closers[i].addEventListener("click", close, false);
			modalssbg[i].addEventListener("click", close, false);
		}
	};

	var init = function() {
		bindActions();
	};

	return {
		init: init
	};
})();

Modalclick.init();

