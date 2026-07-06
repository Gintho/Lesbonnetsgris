document.addEventListener('DOMContentLoaded', function () {
	initAccordions();
	initDonateModal();
	initNewsletterForm();
});

function initAccordions() {
	document.querySelectorAll('.bg-accordion__item').forEach(function (item) {
		var trigger = item.querySelector('.bg-accordion__trigger');
		if (!trigger) return;
		trigger.addEventListener('click', function () {
			var wasOpen = item.classList.contains('is-open');
			item.closest('.bg-accordion').querySelectorAll('.bg-accordion__item').forEach(function (sibling) {
				sibling.classList.remove('is-open');
			});
			if (!wasOpen) item.classList.add('is-open');
		});
	});
}

function initDonateModal() {
	var overlay = document.querySelector('[data-donate-modal]');
	if (!overlay) return;

	var openers = document.querySelectorAll('[data-donate-open]');
	var closers = overlay.querySelectorAll('[data-donate-close]');
	var amountButtons = overlay.querySelectorAll('.bg-donate-amount');
	var submitButton = overlay.querySelector('[data-donate-submit]');
	var preselected = overlay.querySelector('.bg-donate-amount.is-selected');
	var selectedAmount = preselected ? preselected.dataset.amount : (amountButtons.length ? amountButtons[0].dataset.amount : '50');

	function updateSubmitLabel() {
		if (submitButton) submitButton.textContent = 'Faire un don de ' + selectedAmount + '€';
	}
	updateSubmitLabel();

	amountButtons.forEach(function (btn) {
		btn.addEventListener('click', function () {
			amountButtons.forEach(function (b) { b.classList.remove('is-selected'); });
			btn.classList.add('is-selected');
			selectedAmount = btn.dataset.amount;
			updateSubmitLabel();
		});
	});

	function open() {
		overlay.classList.add('is-open');
		document.body.style.overflow = 'hidden';
	}
	function close() {
		overlay.classList.remove('is-open');
		document.body.style.overflow = '';
	}

	openers.forEach(function (btn) { btn.addEventListener('click', open); });
	closers.forEach(function (btn) { btn.addEventListener('click', close); });
	overlay.addEventListener('click', function (e) {
		if (e.target === overlay) close();
	});
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && overlay.classList.contains('is-open')) close();
	});

	if (submitButton) {
		submitButton.addEventListener('click', function () {
			// TODO: no real donation flow is wired up yet. This only closes the
			// modal and shows a confirmation toast — plug in the real payment
			// provider (WooCommerce or otherwise) before shipping this to prod.
			close();
			showToast('Merci, vous êtes officiellement Bonnet Gris 🎉');
		});
	}
}

function showToast(message) {
	var region = document.querySelector('[data-toast-region]');
	if (!region) return;
	var toast = region.querySelector('.bg-toast');
	var text = toast.querySelector('[data-toast-text]');
	if (text) text.textContent = message;
	toast.classList.add('is-visible');

	clearTimeout(region._hideTimer);
	region._hideTimer = setTimeout(function () {
		toast.classList.remove('is-visible');
	}, 3500);

	var closeBtn = toast.querySelector('.bg-toast__close');
	if (closeBtn) {
		closeBtn.onclick = function () {
			clearTimeout(region._hideTimer);
			toast.classList.remove('is-visible');
		};
	}
}

function initNewsletterForm() {
	document.querySelectorAll('[data-newsletter-form]').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			// TODO: wire up to the real newsletter provider (Mailchimp, Brevo, etc).
			showToast('Merci pour votre inscription à la newsletter !');
			form.reset();
		});
	});
}
