  const header = document.querySelector("nav");

const sectionOne = document.querySelector(".banner");

const sectionOneOptions = {
  rootMargin: "-300px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
  entries,
  sectionOneObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      header.classList.add("navs");
    } else {
      header.classList.remove("navs");
    }
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);
