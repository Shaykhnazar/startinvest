function textareaSetHeight(el, offsetTop = 0, defaultHeight = null) {
  el.style.height = "auto";
  el.style.height =
    checkIfOneLine(el) && defaultHeight
      ? `${defaultHeight}px`
      : `${el.scrollHeight + offsetTop}px`;
}

function checkIfOneLine(textarea) {
  const clientHeight = textarea.clientHeight;
  const scrollHeight = textarea.scrollHeight;

  if (scrollHeight > clientHeight) return false;
  else return true;
}

function isParentHidden(el) {
  return el.closest(".hs-collapse") || el.closest(".hs-overlay");
}

function parentType(el) {
  if (el.closest(".hs-collapse")) return "collapse";
  else if (el.closest(".hs-overlay")) return "overlay";
  else return false;
}

function callbackAccordingToType(textarea) {
  if (parentType(textarea) === "collapse") {
    const collapseId = textarea.closest(".hs-collapse").id;
    const { element } = HSCollapse.getInstance(
      `[data-hs-collapse="#${collapseId}"]`,
      true
    );

    element.on("beforeOpen", () => {
      if (!textarea) return false;

      const defaultHeight =
        textarea.getAttribute("data-hs-default-height") || null;

      textareaSetHeight(textarea, 3, defaultHeight);
    });
  } else if (parentType(textarea) === "overlay") {
    const { element } = HSOverlay.getInstance(
      textarea.closest(".hs-overlay"),
      true
    );

    element.on("open", () => {
      if (!textarea) return false;

      const defaultHeight =
        textarea.getAttribute("data-hs-default-height") || null;

      textareaSetHeight(textarea, 3, defaultHeight);
    });
  } else return false;
}

function textareaAutoHeight(textAreas) {
  textAreas.forEach((el) => {
    const textarea = document.querySelector(el);

    if (!textarea) return false;

    const defaultHeight =
      textarea.getAttribute("data-hs-default-height") || null;

    if (isParentHidden(textarea)) callbackAccordingToType(textarea);
    else textareaSetHeight(textarea, 3, defaultHeight);

    textarea.addEventListener("input", () =>
      textareaSetHeight(textarea, 3, defaultHeight)
    );
  });
}
