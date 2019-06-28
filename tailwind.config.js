module.exports = {
  theme: {
    extend: {
      colors: {
        transparent: "transparent",
        shark: "#212529",
        celeste: "#cfd0ce",
        cararra: "#e9eae7",
        white: "#ffffff",
        apple: "#6db943",
        "alert-red": "#f31431",
        "warning-yellow": "#ffae42",
        "camouflage-green": "#757773",
        parsley: "#1e4a18",
        "curious-blue": "#398cd3",
        astronaut: "#255375",

        "bright-gray":  "#f1f4f4",
        "medium-gray":  "#8c9d96",
        "dark-gray":    "#4a4a4a",
        "light-green":  "#dbf8eb",
        "bright-green": "#008943",
        "dark-green":   "#006632",
        "deep-green":   "#003d1e",
      },
    },
    minHeight: {
      "4": "16rem",
      "5-1/2": "21.5rem",
    },
    fontFamily: {
      heading: ["Montserrat", "system-ui", "-apple-system", "sans-serif",],
      body: ["Noto Sans", "system-ui", "-apple-system", "sans-serif",],
    },
    fontSize: {
      xxs: ".625rem", // 10px
      xs: ".75rem", // 12px
      sm: ".875rem", // 14px
      base: "1rem", // 16px
      lg: "1.125rem", // 18px
      xl: "1.25rem", // 20px
      "2xl": "1.5rem", // 24px
      "3xl": "1.875rem", // 30px
      "4xl": "2.25rem", // 36px
      "5xl": "2.625rem", // 42px
      "6xl": "4rem", // 64px
    },
    borderWidth: {
      default: "1px",
      "0": "0",
      "2": "2px",
      "4": "4px",
      "8": "8px",
    },
    width: {
      auto: "auto",
      px: "1px",
      "1": "0.25rem",
      "2": "0.5rem",
      "3": "0.75rem",
      "4": "1rem",
      "5": "1.25rem",
      "6": "1.5rem",
      "8": "2rem",
      "10": "2.5rem",
      "12": "3rem",
      "16": "4rem",
      "24": "6rem",
      "32": "8rem",
      "48": "12rem",
      "64": "16rem",
      "1/2": "50%",
      "1/3": "33.33333%",
      "2/3": "66.66667%",
      "1/4": "25%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.66667%",
      "5/6": "83.33333%",
      full: "100%",
      screen: "100vw",
    },
    height: {
      auto: "auto",
      "0": 0,
      px: "1px",
      "1": "0.25rem",
      "2": "0.5rem",
      "3": "0.75rem",
      "4": "1rem",
      "5": "1.25rem",
      "6": "1.5rem",
      "8": "2rem",
      "10": "2.5rem",
      "12": "3rem",
      "16": "4rem",
      "24": "6rem",
      "32": "8rem",
      "40": "10rem",
      "48": "12rem",
      "64": "16rem",
      half: "50%",
      full: "100%",
      screen: "100vh",
    },
    maxWidth: {
      xs: "20rem",
      sm: "30rem",
      md: "40rem",
      lg: "50rem",
      xl: "60rem",
      "2xl": "70rem",
      "3xl": "80rem",
      "4xl": "90rem",
      "5xl": "100rem",
      full: "100%",
    },
    maxHeight: {
      full: "100%",
      screen: "100vh",
    },
    padding: {
      px: "1px",
      "0": "0",
      "1": "0.25rem",
      "2": "0.5rem",
      "3": "0.75rem",
      "4": "1rem",
      "5": "1.25rem",
      "6": "1.5rem",
      "8": "2rem",
      "10": "2.5rem",
      "12": "3rem",
      "14": "3.5rem",
      "16": "4rem",
      "20": "5rem",
      "24": "6rem",
      "30": "7.5rem",
      "32": "8rem",
      "40": "10rem",
      "52": "13rem",
    },
    margin: {
      auto: "auto",
      px: "1px",
      "0": "0",
      "1": "0.25rem",
      "2": "0.5rem",
      "3": "0.75rem",
      "4": "1rem",
      "5": "1.25rem",
      "6": "1.5rem",
      "8": "2rem",
      "10": "2.5rem",
      "12": "3rem",
      "16": "4rem",
      "20": "5rem",
      "24": "6rem",
      "30": "7.5rem",
      "32": "8rem",
      "-px": "-1px",
      "-1": "-0.25rem",
      "-2": "-0.5rem",
      "-3": "-0.75rem",
      "-4": "-1rem",
      "-5": "-1.25rem",
      "-6": "-1.5rem",
      "-8": "-2rem",
      "-10": "-2.5rem",
      "-12": "-3rem",
      "-16": "-4rem",
      "-20": "-5rem",
      "-24": "-6rem",
      "-30": "-7.5rem",
      "-32": "-8rem",
    },
    boxShadow: {
      default: "0 1px 2px 0 rgba(0,0,0,0.325)",
      md: "0 4px 8px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.08)",
      lg: "0 15px 30px 0 rgba(0,0,0,0.11), 0 5px 15px 0 rgba(0,0,0,0.08)",
      btn: "0 2px 6px 2px #E4E6E3, 0 3px 7px 1px #DBF8EB",
      inner: "inset 0 2px 4px 0 rgba(0,0,0,0.06)",
      outline: "0 0 0 3px rgba(52,144,220,0.5)",
      none: "none",
    },
    zIndex: {
      auto: "auto",
      "neg-10": -10,
      "0": 0,
      "10": 10,
      "20": 20,
      "30": 30,
      "40": 40,
      "50": 50,
      "60": 60,
      "70": 70,
    },
    opacity: {
      "0": "0",
      "3": ".03",
      "6": ".06",
      "12": ".12",
      "25": ".25",
      "50": ".5",
      "75": ".75",
      "100": "1",
    },
    container: theme => ({
      center: true,
    }),
  },
  variants: {
    appearance: ["responsive"],
    backgroundAttachment: ["responsive"],
    backgroundColor: ["responsive", "hover", "group-hover", "focus"],
    backgroundPosition: ["responsive"],
    backgroundRepeat: ["responsive"],
    backgroundSize: ["responsive"],
    borderCollapse: [],
    borderColor: ["responsive", "hover", "group-hover", "focus"],
    borderRadius: ["responsive", "hover", "group-hover"],
    borderStyle: ["responsive"],
    borderWidth: ["responsive"],
    cursor: ["responsive"],
    display: ["responsive"],
    flexDirection: ["responsive"],
    flexWrap: ["responsive"],
    alignItems: ["responsive"],
    alignSelf: ["responsive"],
    justifyContent: ["responsive"],
    alignContent: ["responsive"],
    flex: ["responsive"],
    flexGrow: ["responsive"],
    flexShrink: ["responsive"],
    float: ["responsive"],
    fontFamily: ["responsive"],
    fontWeight: ["responsive", "hover", "group-hover", "focus"],
    height: ["responsive"],
    lineHeight: ["responsive"],
    listStylePosition: ["responsive"],
    listStyleType: ["responsive"],
    margin: ["responsive"],
    maxHeight: ["responsive"],
    maxWidth: ["responsive"],
    minHeight: ["responsive"],
    minWidth: ["responsive"],
    negativeMargin: ["responsive"],
    opacity: ["responsive", "hover", "group-hover"],
    outline: ["focus"],
    overflow: ["responsive"],
    padding: ["responsive"],
    pointerEvents: ["responsive"],
    position: ["responsive"],
    inset: ["responsive"],
    resize: ["responsive"],
    boxShadow: ["responsive", "hover", "group-hover", "focus"],
    fill: [],
    stroke: [],
    tableLayout: ["responsive"],
    textAlign: ["responsive"],
    textColor: ["responsive", "hover", "group-hover", "focus"],
    fontSize: ["responsive"],
    fontStyle: ["responsive", "hover", "group-hover", "focus"],
    fontSmoothing: ["responsive", "hover", "group-hover", "focus"],
    textDecoration: ["responsive", "hover", "group-hover", "focus"],
    textTransform: ["responsive", "hover", "group-hover", "focus"],
    letterSpacing: ["responsive"],
    userSelect: ["responsive"],
    verticalAlign: ["responsive"],
    visibility: ["responsive"],
    whitespace: ["responsive"],
    wordBreak: ["responsive"],
    width: ["responsive"],
    zIndex: ["responsive"],
  },
  plugins: [
    require('tailwindcss-multi-column')(), // no options to configure
  ],
};
