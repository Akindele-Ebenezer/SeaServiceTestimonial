let Vessels_ROUTE = document.querySelectorAll('.vessels-route');
let Testimonials_ROUTE = document.querySelectorAll('.testimonials-route');
let Operations_ROUTE = document.querySelectorAll('.operations-route');
let Notifications_ROUTE = document.querySelectorAll('.notifications-route');
let DeckRating_ROUTE = document.querySelectorAll('.deck-rating-route');
let Engineers_ROUTE = document.querySelectorAll('.engineers-route');
let Captains_ROUTE = document.querySelectorAll('.captains-route');
let Employees_ROUTE = document.querySelectorAll('.employees-route');
let Users_ROUTE = document.querySelectorAll('.users-route');
let Logout_ROUTE = document.querySelectorAll('.logout-route');

let Loader = document.querySelector('.loader');

Vessels_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Vessels';
    })
});

Testimonials_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Testimonials';
    })
});

Operations_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Operations';
    })
});

Notifications_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Notifications';
    })
});

DeckRating_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/DeckRating';
    })
});

Engineers_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Engineers';
    })
});

Captains_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Captains';
    })
});

Employees_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Employees';
    })
});

Users_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Users';
    })
});

Logout_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/';
    })
});

Logout_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/';
    })
});

let FILTERVALUE_X = document.querySelectorAll('.filter-value-x');

FILTERVALUE_X.forEach(Value => {
    Value.addEventListener('click', () => {
        window.location =  window.location.pathname + '?FilterValue=' + Value.textContent;
    })
});