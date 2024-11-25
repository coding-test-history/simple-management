
  const { name, username } = getUserData();

  const capitalizedName = capitalizeFirstLetter(name);
  const capitalizedUsername = capitalizeFirstLetter(username);

  $("#info-name").text(capitalizedName);
  $("#info-username").text(capitalizedUsername);
  $("#info-level-menu").text(capitalizedName);
  $("#info-level").text(capitalizedUsername);