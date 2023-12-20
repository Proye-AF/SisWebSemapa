function autocompletarCombustible() {
    var selectedCombustible = document.getElementById('tipo_combustible');
    var codigoMaterialesInput = document.getElementById('codigo_materiales');
    var unidadInput = document.getElementById('unidad');

    var selectedOption = selectedCombustible.options[selectedCombustible.selectedIndex];

    if (selectedOption.value !== '') {
        codigoMaterialesInput.value = selectedOption.getAttribute('data-codigo');
        unidadInput.value = selectedOption.getAttribute('data-unidad');
    } else {
        codigoMaterialesInput.value = '';
        unidadInput.value = '';
    }
}

function autocompletarChofer() {
    var selectedConductores = document.getElementById('item');
    var nombresInput = document.getElementById('nombres');
    var licenseNumberInput = document.getElementById('license_number'); // Asegúrate de tener un campo para el número de licencia

    var selectedOption = selectedConductores.options[selectedConductores.selectedIndex];
    if (selectedOption.value !== '') {
        nombresInput.value = selectedOption.getAttribute('data-nombres');
        // Verificar si el conductor tiene un número de licencia
        if (selectedOption.getAttribute('data-license-number')) {
            licenseNumberInput.value = selectedOption.getAttribute('data-license-number');
        } 
    } else {
        nombresInput.value = '';
        licenseNumberInput.value = '';
    }
}