export function padNumberWithZeros(
  num: number,
  totalDigits: number = 7
): string {
  //adding zeros to the number
  const numStr = num.toString();
  if (numStr.length >= totalDigits) {
    return numStr;
  }
  const zerosToAdd = totalDigits - numStr.length;
  return "0".repeat(zerosToAdd) + numStr;
}
