(function () {
    if (window.performance && window.performance.getEntriesByType) {
        const performanceEntries = window.performance.getEntriesByType('navigation');
        if (performanceEntries && performanceEntries.length > 0) {
            const navTiming = performanceEntries[0];

            const performanceData = {
                navigationStart: navTiming.startTime, // equivalent to navigationStart
                domContentLoaded: navTiming.domContentLoadedEventStart, // equivalent to domContentLoadedEventEnd
                loadEventEnd: navTiming.loadEventEnd, // equivalent to loadEventEnd
                totalTime: navTiming.loadEventEnd - navTiming.startTime // total time from navigation start
            };

            // Send performance data to the server
            fetch('/log-performance', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(performanceData)
            });
        }
    }
})();
