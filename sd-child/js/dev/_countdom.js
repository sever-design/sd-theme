// Create the floating box
const floater = document.createElement('div');
floater.style.position = 'fixed';
floater.style.bottom = '15px';
floater.style.right = '105px';
floater.style.padding = '5px';
floater.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
floater.style.color = 'white';
floater.style.fontFamily = 'Arial, sans-serif';
floater.style.fontSize = '11px';
floater.style.borderRadius = '5px';
floater.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';
floater.style.zIndex = '9999000';
document.body.appendChild(floater);

// Function to count and display the number of DOM nodes
function updateNodeCount() {
    const totalNodes = document.getElementsByTagName('*').length;
    floater.textContent = `DOM Nodes: ${totalNodes}`;
}

// Update the count initially and at intervals
updateNodeCount();
setInterval(updateNodeCount, 1000);
