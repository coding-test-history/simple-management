const capitalizeFirstLetter = (str) => {
    // Check if the input is a non-empty string
    if (typeof str !== "string" || str.length === 0) {
        return str;
    }

    // Split the input string into words
    const words = str.split(" ");

    // Capitalize the first letter of each word and join them back into a string
    const capitalizedWords = words.map((word) => {
        // Capitalize the first letter of the word and concatenate it with the rest of the word
        return word.charAt(0).toUpperCase() + word.slice(1);
    });

    // Join the capitalized words into a single string
    return capitalizedWords.join(" ");
};

const dropfiyConfig = {
    messages: {
        default: "Drag and drop files or click here",
        replace: "Drag and drop or click to change",
        remove: "Delete",
        error: "Ooops, there was a little mistake :(",
    },
    error: {
        fileSize: "The file is too big ({{ value }} max).",
        imageFormat:
            "Formatting is not allowed, only ({{ value }} is allowed).",
        fileExtension:
            "Formatting is not allowed, only ({{ value }} is allowed).",
    },
    tpl: {
        wrap: '<div class="dropify-wrapper" style="border-radius:10px"></div>',
        message:
            '<div class="dropify-message"><span class="file-icon" /> <p style="font-size:2rem">{{ default }}</p></div>',
        preview:
            '<div class="dropify-preview"><span class="dropify-render" style="border-radius:10px;"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
    },
};

const formatIDR = (number) => `Rp. ${number.toLocaleString("id-ID")}`;

const parseIDR = (formattedString) => {
    // Remove "Rp." and non-numeric characters and parse as an integer
    return parseInt(formattedString.replace(/[^\d]/g, ''), 10);
};
