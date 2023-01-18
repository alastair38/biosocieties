/**
 * File embedPrivacy.js.
 *
 * Handles disabling embeds if enhanced privacy setting is enabled
 */
const frame = document.querySelector('iframe');
if (frame) {
  const dataSrc = frame.src;

  frame.setAttribute('data-src', dataSrc);
  frame.src = '';
}

function showVideo(e) {
  e.parentElement.classList.toggle('hide-message');

  e.parentElement.nextSibling.src = dataSrc;
  e.parentElement.nextSibling.hidden = false;
}
