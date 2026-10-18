(function () {
  let navigationPending = false;

  document.addEventListener("click", function (event) {
    const clickedElement = event.target instanceof Element ? event.target : null;
    const link = clickedElement && clickedElement.closest("a[href]");

    if (
      !link ||
      link.target ||
      link.hasAttribute("download") ||
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

    if (target.origin !== window.location.origin) {
      return;
    }

    const samePage =
      target.pathname === window.location.pathname &&
      target.search === window.location.search;

    if (samePage && target.hash) {
      const section = document.getElementById(decodeURIComponent(target.hash.slice(1)));
      if (!section) return;

      event.preventDefault();
      section.scrollIntoView({ behavior: "smooth", block: "start" });
      window.history.pushState(null, "", target.hash);
      return;
    }

    if (!link.hasAttribute("data-auth-transition") || samePage) {
      return;
    }

    event.preventDefault();
    if (navigationPending) return;

    navigationPending = true;
    document.body.classList.add("auth-nav-leave");

    const curtain = document.createElement("div");
    curtain.className = "navigation-curtain";
    curtain.setAttribute("aria-hidden", "true");
    document.body.appendChild(curtain);

    const transitionDuration = reducedMotion ? 220 : 520;

    window.setTimeout(function () {
      window.location.href = target.href;
    }, transitionDuration);
  });
})();

