console.log('story format: ${window.clique.article.story_format}');

/**
 * A running tally of cumulative layout shift
 */
let sum = 0;

function prettyLog(label, message){
  console.log('%c${label}:%c ${message}', 'background: red; color: white', 'background: transparent; color: red');
}

const po = new PerformanceObserver((list) => {
  for (const entry of list.getEntries()) {
    console.log(entry)
    prettyLog('sources', entry.sources.map(e => {
      if (e.node === null){
        return "(Node removed from DOM)"
      } else {
        return [e.node.className, e.node.id]
      }
    }));
    
    sum += entry.value;
    prettyLog('Cummulative shift', sum)
  }
});

po.observe({ type: "layout-shift", buffered: true });