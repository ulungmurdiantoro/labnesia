/**
 * Labnesia — "Daftar Sekarang" form handler (page-pelatihan-sertifikasi.php)
 *
 * Appends each form submission as a row in a Google Sheet. Does not require
 * any npm/build step — this runs entirely inside Google's servers.
 *
 * SETUP (one-time):
 * 1. Create a new Google Sheet (or open an existing one you want submissions in).
 * 2. Extensions → Apps Script. Delete the default code and paste this whole file.
 * 3. Click Deploy → New deployment → gear icon → "Web app".
 *      - Execute as: Me
 *      - Who has access: Anyone
 *    (It must be "Anyone" — the form posts from a public page with no login.)
 * 4. Click Deploy, authorize the requested permissions, then copy the Web app
 *    URL (ends in /exec).
 * 5. In WordPress: Appearance → Customize → Labnesia Settings → paste that URL
 *    into "Google Apps Script Web App URL (form Daftar Pelatihan & Sertifikasi)".
 *
 * If you ever change this script's code after deploying, use Deploy → Manage
 * deployments → edit (pencil) → New version, otherwise the live URL keeps
 * running the old code.
 */
function doPost(e) {
  var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('Pendaftaran');
  if (!sheet) {
    sheet = SpreadsheetApp.getActiveSpreadsheet().insertSheet('Pendaftaran');
  }
  if (sheet.getLastRow() === 0) {
    sheet.appendRow(['Timestamp', 'Nama', 'WhatsApp', 'Institusi', 'Skema', 'Format']);
  }

  var p = e.parameter;
  sheet.appendRow([
    new Date(),
    p.nama || '',
    p.whatsapp || '',
    p.institusi || '',
    p.skema || '',
    p.format || ''
  ]);

  return ContentService
    .createTextOutput(JSON.stringify({ status: 'ok' }))
    .setMimeType(ContentService.MimeType.JSON);
}
