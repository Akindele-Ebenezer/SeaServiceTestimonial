let Vessels_ROUTE = document.querySelectorAll('.vessels-route');
let Availability_ROUTE = document.querySelectorAll('.availability-route');
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

Availability_ROUTE.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability';
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
        window.location = '/Logout';
    })
}); 

let FilterDocking = document.querySelectorAll('.FilterDocking');
let FilterInspection = document.querySelectorAll('.FilterInspection');
let FilterBunkering = document.querySelectorAll('.FilterBunkering');
let FilterBreakdown = document.querySelectorAll('.FilterBreakdown');
let FilterReady = document.querySelectorAll('.FilterReady');
let FilterMaintenance = document.querySelectorAll('.FilterMaintenance');

FilterDocking.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Docking';
    })
}); 
FilterReady.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Ready';
    })
}); 
FilterBunkering.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Bunkery';
    })
}); 
FilterInspection.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Inspection';
    })
}); 
FilterMaintenance.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Maintenance';
    })
}); 
FilterBreakdown.forEach(Route => {
    Route.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?FilterValue=Breakdown';
    })
}); 

let FILTERVALUE_X = document.querySelectorAll('.filter-value-x');

FILTERVALUE_X.forEach(Value => {
    Value.addEventListener('click', () => {
        window.location =  window.location.pathname + '?FilterValue=' + Value.textContent;
    })
});

let PieLinks = document.querySelectorAll('.pieID li');

PieLinks.forEach(Link => {
    Link.addEventListener('click', () => {
        setTimeout(() => {
            Loader.style.display = 'none';
        }, 9000);
        Loader.style.display = 'flex';
        window.location = '/Availability?VesselStatus=True&Vessel=' + Link.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent + '&Status=' + Link.firstElementChild.textContent;
    })
});