function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
}

function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
}

// Add Specification
var addSpCounter = 1;

function addSpecs() {
    const sl = document.getElementById('speslist');
    const sItem = `<div class="spasItem"><input type="text" placeholder="Specifications" name="item${addSpCounter}"></div>`;
    sl.insertAdjacentHTML('beforeend', sItem);
    addSpCounter++;
}