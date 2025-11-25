const htmlElement = document.documentElement;
const THEME_ATTR = "data-theme";
const THEME_1 = "1";
const THEME_2 = "2";
const THEME_3 = "3";

const setTheme = (theme) => {
    htmlElement.setAttribute(THEME_ATTR, theme);
    localStorage.setItem(THEME_ATTR, theme);
};

const initTheme = () => {
    const savedTheme = localStorage.getItem(THEME_ATTR);
    if (savedTheme) {
        setTheme(savedTheme);
        return;
    }
    setTheme(THEME_1);
}

initTheme();

document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.querySelectorAll(".rd-radio-theme");
    themeToggle.forEach((theme) => {
        theme.addEventListener("change", () => {
            const themeValue = theme.value;
            setTheme(themeValue);
        });
    });
});

