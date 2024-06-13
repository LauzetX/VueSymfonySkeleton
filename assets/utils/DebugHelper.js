export function _log(msg = "empty log", data = {}) {
  console.log("# _LOG #");
  console.log({ log: msg, data: data });
  console.log("");
}
