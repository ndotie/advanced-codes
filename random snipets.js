take all the items keys starts with index_ and put them into an array
const { sri_id, ...rest } = item;
    const values = Object.keys(rest)
      .filter((key) => key.startsWith("index_"))
      .map((key) => rest[key]);
