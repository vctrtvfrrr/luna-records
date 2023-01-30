import { genesisIcons } from "@formkit/icons";
import { generateClasses } from "@formkit/themes";
import genesis from "@formkit/themes/tailwindcss/genesis";

export default {
  icons: { ...genesisIcons },
  config: {
    classes: generateClasses(genesis),
  },
};
