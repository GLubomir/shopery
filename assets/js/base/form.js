export const customOutlineEffect = () => {
	const inputs = document.querySelectorAll('.input-element');
	
	const rootStyles = getComputedStyle(document.documentElement);
	const colorDefaultOutline = rootStyles.getPropertyValue('--c-gray-1');
	const colorOutline = rootStyles.getPropertyValue('--c-primary');

	inputs.forEach(input => {
		changeOutlineColor('focus', input, colorOutline);
		changeOutlineColor('blur', input, colorDefaultOutline);
	});
}

function changeOutlineColor(event, element, color) {
	element.addEventListener(event, () => {
		element.closest('.input-wrapper').style.borderColor = color;
	});
}