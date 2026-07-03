/**
 * Toggle du menu mobile — vanilla ES6+, zéro dépendance (cf. ADR-003).
 */
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('[data-lbg-nav-toggle]');
  const links = document.querySelector('.lbg-nav__links');
  if (!toggle || !links) {
    return;
  }

  toggle.addEventListener('click', () => {
    const isOpen = links.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });
});
