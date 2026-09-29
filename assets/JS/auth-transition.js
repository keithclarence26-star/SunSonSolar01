(function () {
  document.addEventListener("click", function (event) {
    const link = event.target.closest("a[data-auth-transition]");

    if (
      !link ||
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return;
    }

    const target = new URL(link.href, window.location.href);
    const reducedMotion = window.matchMedia(
      "(prefers-reduced-motion: reduce)"
    ).matches;

    if (target.origin !== window.location.origin || reducedMotion) {
      return;
    }

    event.preventDefault();
    document.body.classList.add("auth-nav-leave");

    window.setTimeout(function () {
      window.location.href = target.href;
    }, 460);
  });
})();

