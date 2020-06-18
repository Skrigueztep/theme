// DOM Modification

/**
 * Modify DOM Creating a new property
 *
 * @param property => An OPI property obj
 * @param propertyContainerId => HTML Element Id to appendChild the new property
 * */
export function createProperty(property, propertyContainerId) {

    if (!property) return;

    // TODO: Verify validation | typeof different string
    // if (typeof(propertyContainerId) != 'string') return throw new Error('Ups!... type of propertyContainerId on function createProperty isn´t a string');

    const propertiesContainer = document.getElementById(propertyContainerId);
    const propertyContainer = document.createElement('div');
    propertyContainer.setAttribute('class', 'property');

    const a = document.createElement('a');
    a.setAttribute('class', 'property-link');
    a.setAttribute('href', 'https://agent.maplander.com/' + property.url);

    const offering = document.createElement('span');
    offering.setAttribute('class', 'property-offering');
    offering.textContent = convertOfferingType(property.offering);

    const img = document.createElement('img');
    img.setAttribute('class', 'property-image');
    img.setAttribute('src', property.image);
    img.setAttribute('alt', 'property image');

    const price = document.createElement('span');
    price.setAttribute('class', 'property-price');
    price.textContent = `$${property.price}`;

    const content = document.createElement('div');
    content.setAttribute('class', 'property-content');

    const type = document.createElement('span');
    type.setAttribute('class', 'property-type text-blue');
    type.textContent = convertPropertyType(property.type);

    const br = document.createElement('br');
    const address = document.createElement('span');
    address.setAttribute('class', 'property-address text-blue');
    address.textContent = `${property.address.street} ${property.address.colony} ${property.address.city}`;

    const amenities = document.createElement('div');
    amenities.setAttribute('class', 'property-amenities');

    const bed = document.createElement('span');
    bed.setAttribute('class', 'property-bed');
    bed.textContent = property.features.bedrooms;

    const bad = document.createElement('span');
    bad.setAttribute('class', 'property-bad');
    bad.textContent = property.features.bathrooms;

    const build = document.createElement('span');
    build.setAttribute('class', 'property-build');
    const sup = document.createElement('sup');
    build.textContent = property.features.mainArea;
    sup.textContent = 'm2';
    build.appendChild(sup);

    const car = document.createElement('span');
    car.setAttribute('class', 'property-car');
    car.textContent = property.features.parkingSpaces;

    propertiesContainer.appendChild(propertyContainer);
    propertyContainer.appendChild(a);
    propertyContainer.appendChild(content);
    a.appendChild(offering);
    a.appendChild(img);
    a.appendChild(price);
    content.appendChild(type);
    content.appendChild(br);
    content.appendChild(address);
    content.appendChild(amenities);
    amenities.appendChild(bed);
    amenities.appendChild(createDividerLine());
    amenities.appendChild(bad);
    amenities.appendChild(createDividerLine());
    amenities.appendChild(build);
    amenities.appendChild(createDividerLine());
    amenities.appendChild(car);
}

/**
 * Create span that display a vertical line
 *
 * This is user by createProperty function
 * */
export function createDividerLine() {
    const dividerLine = document.createElement('span');
    dividerLine.setAttribute('class', 'divider-line');

    return dividerLine;
}

/**
 * Create an element for add to pagination HTML Element
 *
 * @param identifier => index or number given on createPagination function
 * */
export function createPaginationItem(identifier) {
    const paginationContainer = document.getElementById('pagination');

    const span = document.createElement('span');
    span.setAttribute('class', 'pagination-item');
    span.textContent = identifier;

    paginationContainer.appendChild(span);

}

// Utilities

/**
 * Return a value according to PropertyType Enum or translation
 *
 * @param type => string value
 * @return string value according PropertyType Enum or translation
 * */
export function convertPropertyType(type) {
    if (typeof(type) !== 'string') return; // throw new Error('Ups!!... Type on convertPropertyType function isn´t a string');
    switch (type.toUpperCase()) {
        /*      SPANISH      */
        case 'DEPARTAMENTO':
            type = 'APARTMENT';
            break;
        case 'CASA':
            type = 'HOUSE';
            break;
        case 'INVERSION':
            type = 'INVESTMENT';
            break;
        case 'TERRENO':
            type = 'LAND';
            break;
        case 'OFICINA':
            type = 'OFFICE';
            break;
        case 'VIVIENDA':
            type = 'RESIDENTIAL';
            break;
        case 'COMERCIO':
            type = 'RETAIL';
            break;
        case 'HABITACION':
            type = 'ROOM';
            break;
        case 'BODEGA':
            type = 'WAREHOUSE';
            break;
        /*     ENGLISH      */
        case 'APARTMENT':
            type = 'Departamento';
            break;
        case 'HOUSE':
            type = 'Casa';
            break;
        case 'INVESTMENT':
            type = 'Inversión';
            break;
        case 'LAND':
            type = 'Terreno';
            break;
        case 'OFFICE':
            type = 'Oficina';
            break;
        case 'RESIDENTIAL':
            type = 'Vivienda';
            break;
        case 'RETAIL':
            type = 'Comercio';
            break;
        case 'ROOM':
            type = 'Habitación';
            break;
        case 'WAREHOUSE':
            type = 'Bodega';
            break;
    }
    return type;
}

/**
 * Return a value according to OfferingType Enum or translation
 *
 * @param offering => string value
 * @return string value according OfferingType Enum or translation
 * */
export function convertOfferingType(offering) {
    if (typeof(offering) !== 'string') return; // throw new Error('Ups!... Type of offering on convertOfferingType function isn´t a string');
    switch (offering.toUpperCase()) {
        case 'SALE':
            offering = 'Venta';
            break;
        case 'RENT':
            offering = 'Renta';
            break;
        case 'VENTA':
            offering = 'SALE';
            break;
        case 'RENTA':
            offering = 'RENT';
            break;
    }
    return offering;
}
