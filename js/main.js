// A1 CDL School — interactions
(function () {
  document.documentElement.classList.add("js");

  const header = document.querySelector(".site-header");
  const nav = document.getElementById("main-nav");
  const toggle = document.querySelector(".nav-toggle");
  const navLinks = nav.querySelectorAll("a");

  // Header shadow on scroll
  const onScroll = () => header.classList.toggle("scrolled", window.scrollY > 10);
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  // Mobile menu
  const setMenu = (open) => {
    nav.classList.toggle("open", open);
    toggle.setAttribute("aria-expanded", String(open));
    toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
  };
  toggle.addEventListener("click", () => setMenu(!nav.classList.contains("open")));
  navLinks.forEach((link) => link.addEventListener("click", () => setMenu(false)));
  document.addEventListener("keydown", (e) => { if (e.key === "Escape") setMenu(false); });
  window.addEventListener("resize", () => { if (window.innerWidth > 1024) setMenu(false); });

  // Highlight the nav link for the section in view
  const sections = [...document.querySelectorAll("main section[id]")];
  const spyLinks = [...navLinks].filter((a) => a.getAttribute("href").startsWith("#"));
  const spy = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      spyLinks.forEach((a) => a.classList.toggle("active", a.getAttribute("href") === "#" + entry.target.id));
    });
  }, { rootMargin: "-45% 0px -50% 0px" });
  sections.forEach((s) => spy.observe(s));

  // Reveal on scroll
  const revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const reveal = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const siblings = [...entry.target.parentElement.children].filter((el) => el.classList.contains("reveal"));
        entry.target.style.transitionDelay = Math.min(siblings.indexOf(entry.target), 4) * 90 + "ms";
        entry.target.classList.add("visible");
        obs.unobserve(entry.target);
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
    revealEls.forEach((el) => reveal.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add("visible"));
  }

  document.getElementById("year").textContent = new Date().getFullYear();

  // Contact form (home page only)
  const form = document.getElementById("contact-form");
  if (!form) return;

  // Program buttons preselect the program in the contact form
  const programSelect = document.getElementById("program");
  document.querySelectorAll("[data-program]").forEach((btn) => {
    btn.addEventListener("click", () => { programSelect.value = btn.dataset.program; });
  });

  // Contact form validation
  const success = form.querySelector(".form-success");
  const rules = {
    name: (v) => v.trim().length >= 2 || "Please enter your name.",
    phone: (v) => v.replace(/\D/g, "").length >= 10 || "Please enter a valid phone number.",
    email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) || "Please enter a valid email address.",
  };
  const validate = (input) => {
    const result = rules[input.name](input.value);
    const field = input.closest(".field");
    const ok = result === true;
    field.classList.toggle("invalid", !ok);
    field.querySelector(".error").textContent = ok ? "" : result;
    input.setAttribute("aria-invalid", String(!ok));
    return ok;
  };
  Object.keys(rules).forEach((name) => {
    const input = form.elements[name];
    input.addEventListener("blur", () => validate(input));
    input.addEventListener("input", () => { if (input.closest(".field").classList.contains("invalid")) validate(input); });
  });
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = Object.keys(rules).map((n) => form.elements[n]);
    const results = inputs.map(validate);
    const firstInvalid = inputs[results.indexOf(false)];
    if (firstInvalid) { firstInvalid.focus(); return; }
    // TODO: connect to a backend or form service (e.g. Formspree, Netlify Forms)
    form.reset();
    success.hidden = false;
    setTimeout(() => { success.hidden = true; }, 8000);
  });
})();
