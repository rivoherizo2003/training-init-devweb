// --- 1. GAME LOGIC (Promise & Callback) ---

function startGame(duration, onTick) {
    return new Promise((resolve, reject) => {
        let timeLeft = duration;
        const btnDefuse = document.getElementById('btn-defuse');
        
        onTick(timeLeft); // Initial callback execution

        const timerId = setInterval(() => {
            timeLeft--;
            onTick(timeLeft);

            if (timeLeft <= 0) {
                cleanUp();
                reject("BOOM! The bomb exploded."); 
            }
        }, 1000);

        // Nested handler to resolve the promise upon user action
        const handleDefuse = () => {
            cleanUp();
            resolve("Bomb defused! You saved the day.");
        };

        // Utility to prevent memory leaks and clean up events
        const cleanUp = () => {
            clearInterval(timerId);
            btnDefuse.removeEventListener('click', handleDefuse);
        };

        btnDefuse.addEventListener('click', handleDefuse);
    });
}

// --- 2. UI AND DOM INTERACTION ---

const btnStart = document.getElementById('btn-start');
const btnDefuse = document.getElementById('btn-defuse');
const timeDisplay = document.getElementById('time-display');
const messageDisplay = document.getElementById('message-display');

const updateTimeUI = (time) => {
    timeDisplay.textContent = time;
};

const resetUI = () => {
    messageDisplay.textContent = "";
    btnStart.disabled = true;
    btnDefuse.disabled = false;
};

const finishUI = (message, color) => {
    messageDisplay.textContent = message;
    messageDisplay.style.color = color;
    btnStart.disabled = false;
    btnDefuse.disabled = true;
};

// --- 3. GAME INITIALIZATION ---

btnStart.addEventListener('click', () => {
    resetUI();

    startGame(5, updateTimeUI)
        .then((successMessage) => {
            // Triggered if resolve() is called
            finishUI(successMessage, "green");
        })
        .catch((errorMessage) => {
            // Triggered if reject() is called
            finishUI(errorMessage, "red");
        });
});