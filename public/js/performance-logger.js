window.addEventListener('load', () => {
    setTimeout(() => {
        const navigation = performance.getEntriesByType('navigation')[0] || {};

        const performanceData = {
            user_id: "test_user",
            url: window.location.href,
            timestamp: new Date().toISOString(),
            data: {
                navigationStart: navigation.navigationStart || performance.timing?.navigationStart || null,
                domContentLoaded: navigation.domContentLoadedEventEnd || null,
                loadEventEnd: navigation.loadEventEnd || null,
                redirectCount: navigation.redirectCount || null,
                loadEventStart: navigation.loadEventStart || null,
                domContentLoadedEventStart: navigation.domContentLoadedEventStart || null
            }
        };

        fetch('/index.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(performanceData)
        }).then(response => response.json())
          .catch(console.error);
    }, 100);
});
