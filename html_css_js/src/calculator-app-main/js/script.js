const htmlElement = document.documentElement;
const THEME_ATTR = "data-theme";
const THEME_1 = "1";
const THEME_2 = "2";
const THEME_3 = "3";

const setTheme = (theme) => {
    console.log(theme);
    htmlElement.setAttribute(THEME_ATTR, theme);
    localStorage.setItem(THEME_ATTR, theme);
};

const initTheme = () => {
    const savedTheme = localStorage.getItem(THEME_ATTR) ?? 1;
    document.getElementById(`rd-radio-${savedTheme}`).setAttribute("checked", true);
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
        console.log(theme);
        theme.addEventListener("change", () => {
            const themeValue = theme.value;
            console.log("theme value " +theme.value)
            setTheme(themeValue);
        });
    });
});

const btnOperators = document.querySelectorAll(".btn-operator")
const resultDiv = document.getElementById("div-result");
btnOperators.forEach((obj) => {
    obj.addEventListener("click", () => {
        if(parseInt(resultDiv.innerHTML) === 0){
            resultDiv.innerHTML = obj.innerHTML;
            return;
        }

        resultDiv.innerHTML = resultDiv.innerHTML + obj.innerHTML;
    });
})

