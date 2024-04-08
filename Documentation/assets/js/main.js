(function($) {
    "use strict";

    // Get Current Year
    document.querySelectorAll("[data-year]").forEach((el) => {
        el.textContent = new Date().getFullYear();
    });

    // Sidebar
    let menuIcon = document.querySelector(".vironeer__menu__toggle"),
        sidebar = document.querySelector(".vironeer__docs__sidebar");

    if (sidebar) {
        menuIcon.onclick = () => {
            menuIcon.classList.toggle("active");
            sidebar.classList.toggle("active");

            if (sidebar.classList.contains("active")) {
                document.body.style.overflow = "hidden";
            } else {
                document.body.removeAttribute("style");
            }
        };
    }

    // ActiveLinks When Scroll
    let articles = document.querySelectorAll(".vironeer__docs__articles .vironeer__docs__article"),
        sidebarLinks = document.querySelectorAll(".vironeer__docs__sidebar .link");

    if (sidebarLinks) {
        sidebarLinks.forEach((el) => {
            el.onclick = () => {
                let targetPoint = document.querySelector("#" + el.getAttribute("data-target")).offsetTop - 100;
                window.scrollTo(0, targetPoint);
            };
        });
    }

    if (articles) {
        let activeLinks = () => {
            let endPoint = document.documentElement.offsetHeight - window.innerHeight;

            if (window.scrollY == endPoint) {
                sidebarLinks.forEach((eRemove) => {
                    eRemove.classList.remove("active");
                });
                sidebarLinks[sidebarLinks.length - 1].classList.add("active");
            } else {
                articles.forEach((el, id) => {
                    if ((el.offsetTop - (window.innerHeight * .50)) < window.scrollY) {
                        sidebarLinks.forEach((e) => {
                            if (e.getAttribute("data-target") == el.getAttribute("id")) {
                                sidebarLinks.forEach((eRemove) => {
                                    eRemove.classList.remove("active");
                                });

                                sidebarLinks[id].classList.add("active");
                            }
                        });
                    }
                });
            }

        };

        window.addEventListener("scroll", activeLinks);
        window.addEventListener("load", activeLinks);
    }

    hljs.highlightAll();

    // Code Replace
    function codeReplace(element) {
        element.innerHTML = element.innerHTML.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    document.querySelectorAll("code[class*='language-html']").forEach(codeReplace);

    // Copy
    let vrCode = document.querySelectorAll(".vironeer__code");

    vrCode.forEach((el) => {
        let vrCodeCopy = el.querySelector(".vironeer__code__copy");
        vrCodeCopy.onmouseenter = () => {
            vrCodeCopy.innerHTML = "Copy";
            vrCodeCopy.classList.remove("copied");
        };
        vrCodeCopy.onclick = () => {
            var range = document.createRange();
            range.selectNode(el.querySelector("pre>code"));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
            window.getSelection().removeAllRanges(); // to deselect
            vrCodeCopy.innerHTML = "Copied!";
            vrCodeCopy.classList.add("copied");
        };
    });

})(jQuery);