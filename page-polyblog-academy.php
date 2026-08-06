<?php
/**
 * Template Name: PolyBlog Academy
 */

// ─── Email Template: Admin notification ─────────────────────────────────────
if ( ! function_exists( 'polyblog_academy_admin_email' ) ) {
    function polyblog_academy_admin_email( array $d ) : string {
        $fields = [
            '1. Full Name / الاسم الكامل'          => esc_html( $d['full_name'] ),
            '2. Date of Birth / تاريخ الولادة'      => esc_html( $d['dob'] ),
            '3. Gender / الجنس'                     => esc_html( $d['gender'] ),
            '4. Place of Residence / مكان السكن'    => esc_html( $d['residence'] ),
            '5. Education / المستوى التعليمي'       => esc_html( $d['education'] ),
            '6. Field of Study / الاختصاص'          => esc_html( $d['field_of_study'] ),
            '7. Occupation / المهنة'                => esc_html( $d['occupation'] ),
            '8. Mobile / رقم الهاتف'               => esc_html( $d['mobile'] ),
            '9. Email / البريد الإلكتروني'          => '<a href="mailto:' . esc_attr( $d['email'] ) . '" style="color:#ffdb0b;">' . esc_html( $d['email'] ) . '</a>',
            '10. Commitment / الالتزام'             => '&#10003; Confirmed',
        ];
        $rows_html = '';
        foreach ( $fields as $label => $val ) {
            $rows_html .= '<tr>
              <td style="padding:11px 22px;border-bottom:1px solid #252225;font-family:Arial,sans-serif;font-size:12px;color:#888;white-space:nowrap;vertical-align:top;width:230px;">' . esc_html( $label ) . '</td>
              <td style="padding:11px 22px;border-bottom:1px solid #252225;font-family:Arial,sans-serif;font-size:13px;color:#fff;">' . $val . '</td>
            </tr>';
        }
        return '<!DOCTYPE html><html><head><meta charset="UTF-8"></head>
<body style="margin:0;padding:0;background:#0d0c0d;">
<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#0d0c0d">
<tr><td align="center" style="padding:40px 16px;">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">
  <tr><td style="background:#ffdb0b;padding:9px 28px;">
    <span style="font-family:Arial,sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:#141213;">PolyBlog Academy</span>
  </td></tr>
  <tr><td style="background:#141213;padding:28px 28px 20px;">
    <h2 style="margin:0 0 6px;font-family:Arial,sans-serif;font-size:21px;font-weight:700;color:#fff;">New Application Received</h2>
    <p style="margin:0;font-family:Arial,sans-serif;font-size:13px;color:#aaa;">Digital Journalism Training Program &middot; In collaboration with KAS</p>
  </td></tr>
  <tr><td style="background:#ffdb0b;height:2px;"></td></tr>
  <tr><td style="background:#141213;padding:6px 0;">
    <table width="100%" cellpadding="0" cellspacing="0">' . $rows_html . '</table>
  </td></tr>
  <tr><td style="background:#1a1819;padding:24px 28px;">
    <p style="margin:0 0 8px;font-family:Arial,sans-serif;font-size:10px;color:#888;text-transform:uppercase;letter-spacing:2px;">11. Motivation &amp; Expectations</p>
    <p style="margin:0;font-family:Arial,sans-serif;font-size:13px;color:#fff;line-height:1.8;">' . nl2br( esc_html( $d['motivation'] ) ) . '</p>
  </td></tr>
  <tr><td style="background:#0d0c0d;padding:18px 28px;border-top:1px solid #252225;text-align:center;">
    <p style="margin:0;font-family:Arial,sans-serif;font-size:11px;color:#555;">PolyBlog Academy &middot; polybloglb.com</p>
  </td></tr>
</table>
</td></tr></table>
</body></html>';
    }
}

// ─── Email Template: Applicant thank-you ────────────────────────────────────
if ( ! function_exists( 'polyblog_academy_thankyou_email' ) ) {
    function polyblog_academy_thankyou_email( string $name ) : string {
        $first = esc_html( explode( ' ', trim( $name ) )[0] );
        $full  = esc_html( $name );
        return '<!DOCTYPE html><html><head><meta charset="UTF-8"></head>
<body style="margin:0;padding:0;background:#0d0c0d;">
<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#0d0c0d">
<tr><td align="center" style="padding:40px 16px;">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">
  <tr><td style="background:#ffdb0b;padding:9px 28px;">
    <span style="font-family:Arial,sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:#141213;">PolyBlog Academy</span>
  </td></tr>
  <tr><td style="background:#141213;padding:42px 28px 28px;text-align:center;">
    <h1 style="margin:0 0 8px;font-family:Arial,sans-serif;font-size:28px;font-weight:700;color:#fff;">Thank You, ' . $first . '!</h1>
    <p style="margin:0;font-family:Arial,sans-serif;font-size:15px;color:#ffdb0b;letter-spacing:1px;">&#1588;&#1603;&#1585;&#1575;&#1611; &#1604;&#1578;&#1602;&#1583;&#1610;&#1605;&#1603; &middot; ' . $full . '</p>
  </td></tr>
  <tr><td style="background:#ffdb0b;height:3px;"></td></tr>
  <tr><td style="background:#141213;padding:28px 28px 16px;">
    <p style="margin:0 0 14px;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.8;">
      We have successfully received your application to the
      <strong style="color:#ffdb0b;">PolyBlog Academy Digital Journalism Program</strong>,
      developed in collaboration with the Konrad Adenauer Stiftung (KAS).
    </p>
    <p style="margin:0 0 14px;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.8;">
      Our team will carefully review all submissions. Shortlisted candidates will be contacted directly
      with details about the next steps.
    </p>
    <p style="margin:0;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.8;">
      We appreciate your commitment to independent, evidence-based journalism in Lebanon.
    </p>
  </td></tr>
  <tr><td style="padding:0 28px;"><hr style="border:none;border-top:1px solid #252225;margin:0;"></td></tr>
  <tr><td style="background:#141213;padding:16px 28px 30px;direction:rtl;text-align:right;">
    <p style="margin:0 0 14px;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.9;">
      &#1604;&#1602;&#1583; &#1575;&#1587;&#1578;&#1604;&#1605;&#1606;&#1575; &#1591;&#1604;&#1576;&#1603; &#1604;&#1604;&#1575;&#1606;&#1590;&#1605;&#1575;&#1605; &#1573;&#1604;&#1609;
      <strong style="color:#ffdb0b;">&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1571;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577; &#1576;&#1608;&#1604;&#1610;&#1576;&#1604;&#1608;&#1594; &#1604;&#1604;&#1589;&#1581;&#1575;&#1601;&#1577; &#1575;&#1604;&#1585;&#1602;&#1605;&#1610;&#1577;</strong>&#1548;
      &#1575;&#1604;&#1605;&#1591;&#1608;&#1614;&#1617;&#1585; &#1576;&#1575;&#1604;&#1578;&#1593;&#1575;&#1608;&#1606; &#1605;&#1593; &#1605;&#1572;&#1587;&#1587;&#1577; &#1603;&#1608;&#1606;&#1585;&#1575;&#1583; &#1571;&#1583;&#1610;&#1606;&#1575;&#1608;&#1585; (KAS).
    </p>
    <p style="margin:0 0 14px;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.9;">
      &#1587;&#1610;&#1602;&#1608;&#1605; &#1601;&#1585;&#1610;&#1602;&#1606;&#1575; &#1576;&#1605;&#1585;&#1575;&#1580;&#1593;&#1577; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1591;&#1604;&#1576;&#1575;&#1578; &#1576;&#1593;&#1606;&#1575;&#1610;&#1577;&#1548;
      &#1608;&#1587;&#1610;&#1578;&#1605; &#1575;&#1604;&#1578;&#1608;&#1575;&#1589;&#1604; &#1605;&#1593; &#1575;&#1604;&#1605;&#1585;&#1588;&#1581;&#1610;&#1606; &#1575;&#1604;&#1605;&#1582;&#1578;&#1575;&#1585;&#1610;&#1606; &#1605;&#1576;&#1575;&#1588;&#1585;&#1577;&#1611; &#1604;&#1604;&#1573;&#1591;&#1604;&#1575;&#1593; &#1593;&#1604;&#1609; &#1575;&#1604;&#1582;&#1591;&#1608;&#1575;&#1578; &#1575;&#1604;&#1604;&#1575;&#1581;&#1602;&#1577;.
    </p>
    <p style="margin:0;font-family:Arial,sans-serif;font-size:14px;color:#fff;line-height:1.9;">
      &#1606;&#1602;&#1583;&#1617;&#1585; &#1575;&#1604;&#1578;&#1586;&#1575;&#1605;&#1603; &#1576;&#1583;&#1593;&#1605; &#1575;&#1604;&#1589;&#1581;&#1575;&#1601;&#1577; &#1575;&#1604;&#1605;&#1587;&#1578;&#1602;&#1604;&#1577; &#1608;&#1575;&#1604;&#1602;&#1575;&#1574;&#1605;&#1577; &#1593;&#1604;&#1609; &#1575;&#1604;&#1571;&#1583;&#1604;&#1577; &#1601;&#1610; &#1604;&#1576;&#1606;&#1575;&#1606;.
    </p>
  </td></tr>
  <tr><td style="background:#1a1819;padding:24px 28px;text-align:center;">
    <a href="https://polybloglb.com" style="display:inline-block;background:#ffdb0b;color:#141213;font-family:Arial,sans-serif;font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;text-decoration:none;padding:13px 30px;border-radius:3px;">Visit PolyBlog</a>
  </td></tr>
  <tr><td style="background:#0d0c0d;padding:18px 28px;border-top:1px solid #252225;text-align:center;">
    <p style="margin:0;font-family:Arial,sans-serif;font-size:11px;color:#555;">
      PolyBlog &middot; <a href="https://polybloglb.com" style="color:#555;text-decoration:none;">polybloglb.com</a>
      &middot; In collaboration with KAS
    </p>
  </td></tr>
</table>
</td></tr></table>
</body></html>';
    }
}

// ─── Helper: safe repopulate ─────────────────────────────────────────────────
if ( ! function_exists( 'academy_val' ) ) {
    function academy_val( string $key, array $data ) : string {
        return esc_attr( $data[ $key ] ?? '' );
    }
}
// ─── AJAX form handler — intercepts POST before HTML output, returns JSON ──
if ( 'POST' === $_SERVER['REQUEST_METHOD']
    && ! empty( $_POST['academy_nonce'] )
    && ! empty( $_POST['is_ajax'] ) ) {

    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['academy_nonce'] ) ), 'polyblog_academy_form' ) ) {
        wp_send_json_error( [ 'message' => 'Security check failed.' ] );
    }

    $pd = [
        'full_name'      => sanitize_text_field( wp_unslash( $_POST['full_name']       ?? '' ) ),
        'dob'            => sanitize_text_field( wp_unslash( $_POST['dob']             ?? '' ) ),
        'gender'         => sanitize_text_field( wp_unslash( $_POST['gender']          ?? '' ) ),
        'residence'      => sanitize_text_field( wp_unslash( $_POST['residence']       ?? '' ) ),
        'education'      => sanitize_text_field( wp_unslash( $_POST['education']       ?? '' ) ),
        'edu_other'      => sanitize_text_field( wp_unslash( $_POST['edu_other']       ?? '' ) ),
        'field_of_study' => sanitize_text_field( wp_unslash( $_POST['field_of_study']  ?? '' ) ),
        'occupation'     => sanitize_text_field( wp_unslash( $_POST['occupation']      ?? '' ) ),
        'mobile'         => sanitize_text_field( wp_unslash( $_POST['mobile']          ?? '' ) ),
        'email'          => sanitize_email(      wp_unslash( $_POST['applicant_email'] ?? '' ) ),
        'commitment'     => isset( $_POST['commitment'] ),
        'motivation'     => sanitize_textarea_field( wp_unslash( $_POST['motivation']  ?? '' ) ),
    ];

    $errs = [];
    if ( empty( $pd['full_name'] ) )      $errs['full_name']       = 'Full Name is required. / الاسم مطلوب.';
    if ( empty( $pd['dob'] ) )            $errs['dob']             = 'Date of Birth is required. / تاريخ الولادة مطلوب.';
    if ( empty( $pd['gender'] ) )         $errs['gender']          = 'Please select your gender. / يرجى تحديد الجنس.';
    if ( empty( $pd['residence'] ) )      $errs['residence']       = 'Place of Residence is required. / مكان السكن مطلوب.';
    if ( empty( $pd['education'] ) )      $errs['education']       = 'Please select your education level. / يرجى تحديد المستوى التعليمي.';
    if ( $pd['education'] === 'other' && empty( $pd['edu_other'] ) )
                                          $errs['edu_other']       = 'Please specify your education. / يرجى التحديد.';
    if ( empty( $pd['field_of_study'] ) ) $errs['field_of_study']  = 'Field of Study is required. / الاختصاص مطلوب.';
    if ( empty( $pd['occupation'] ) )     $errs['occupation']      = 'Occupation is required. / المهنة مطلوبة.';
    if ( empty( $pd['mobile'] ) )         $errs['mobile']          = 'Mobile Number is required. / رقم الهاتف مطلوب.';
    if ( empty( $pd['email'] ) )          $errs['applicant_email'] = 'Email Address is required. / البريد مطلوب.';
    elseif ( ! is_email( $pd['email'] ) ) $errs['applicant_email'] = 'Please enter a valid email. / بريد غير صحيح.';
    if ( ! $pd['commitment'] )            $errs['commitment']      = 'Please confirm your commitment. / يرجى التأكيد.';
    if ( empty( $pd['motivation'] ) ) {
        $errs['motivation'] = 'Motivation is required. / الدافع مطلوب.';
    } else {
        $wc = count( preg_split( '/\s+/u', trim( $pd['motivation'] ), -1, PREG_SPLIT_NO_EMPTY ) );
        if ( $wc > 250 ) $errs['motivation'] = 'Exceeds 250 words (current: ' . $wc . ').';
    }

    if ( ! empty( $errs ) ) {
        wp_send_json_error( [ 'fields' => $errs ] );
    }

    $edu_label  = $pd['education'] === 'other' ? 'Other: ' . $pd['edu_other'] : $pd['education'];
    $email_data = array_merge( $pd, [ 'education' => $edu_label ] );
    $headers    = [
        'Content-Type: text/html; charset=UTF-8',
        'From: PolyBlog Academy <noreply@polybloglb.com>',
    ];

    wp_mail(
        'kouyoumdjianmike@gmail.com',
        'New PolyBlog Academy Application – ' . $pd['full_name'],
        polyblog_academy_admin_email( $email_data ),
        $headers
    );
    wp_mail(
        $pd['email'],
        'Thank You for Applying – PolyBlog Academy | شكراً لتقديمك إلى أكاديمية بوليبلوغ',
        polyblog_academy_thankyou_email( $pd['full_name'] ),
        $headers
    );

    wp_send_json_success( [ 'message' => 'Application submitted successfully.' ] );
}
// ─── Inline page styles via wp_head ──────────────────────────────────────────
add_action( 'wp_head', function () {
    if ( ! is_page_template( 'page-polyblog-academy.php' ) ) {
        return;
    }
    ?>
<style>
/* ===== PolyBlog Academy Page ===== */
.polyblog-academy-page { background-color: #141213; color: #fff; }

.academy-white-line { border-bottom: 6px solid #fff; width: 100%; }

/* Title pill */
.academy-title-block { text-align: center; padding: 2.5rem 0 1.5rem; }
.academy-title-pill {
    display: inline-block;
    background-color: #c90500;
    border-radius: 150px;
    padding: 1.5rem 4rem;
}
.academy-title-pill h1 { margin: 0; line-height: 1.2; }
.academy-title-pill .en-bold {
    display: block;
    font-size: clamp(1.8rem, 4.5vw, 3.2rem);
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 5px;
}
.academy-title-pill .ar-bold {
    display: block;
    font-size: clamp(1.2rem, 3vw, 2rem);
    color: #fff;
    margin-top: 0.4rem;
}

/* Partner badge */
.academy-partner-badge { text-align: center; margin: 1.25rem 0 2.5rem; }
.academy-partner-badge span {
    display: inline-block;
    font-family: "Lexend-Regular", sans-serif;
    font-size: 0.78rem;
    color: #888;
    border: 1px solid #2e2c2d;
    padding: 0.45rem 1.4rem;
    border-radius: 100px;
    letter-spacing: 0.5px;
}

/* Description blocks */
.academy-description { margin-bottom: 3.5rem; }
.academy-lang-block {
    background-color: #1a1819;
    padding: 2rem 2.25rem;
    border-radius: 6px;
    height: 100%;
}
.academy-lang-block.en-block { border-left: 3px solid #ffdb0b; }
.academy-lang-block.ar-block { border-right: 3px solid #ffdb0b; direction: rtl; text-align: right; }
.academy-lang-block p { font-size: 0.92rem; line-height: 1.85; color: #ccc; margin-bottom: 1.1rem; }
.academy-lang-block p:last-child { margin-bottom: 0; }
.en-block p { font-family: "Lexend-Regular", sans-serif; }
.ar-block p { font-family: "NotoKufiArabic-Regular", sans-serif; line-height: 2; }
.academy-lang-block strong { color: #fff; }

/* Section separator */
.academy-divider { border: none; border-top: 1px solid #2a2729; margin: 3rem 0; }

/* Form section title */
.academy-form-title {
    text-align: center;
    background-color: #0d0c0d;
    border-top: 3px solid #ffdb0b;
    border-radius: 6px;
    padding: 1.5rem 1.5rem;
    margin-bottom: 2.5rem;
}
.academy-form-title h2 { margin: 0; }
.academy-form-title .en-bold { display: block; font-size: clamp(1.1rem,2.5vw,1.8rem); color: #fff; text-transform: uppercase; letter-spacing: 4px; }
.academy-form-title .ar-bold { display: block; font-size: clamp(0.95rem,2vw,1.3rem); color: #ffdb0b; margin-top: 0.45rem; }

/* Required note */
.academy-req-note { font-family: "Lexend-Regular", sans-serif; font-size: 0.8rem; color: #777; display: block; margin-bottom: 2rem; }
.academy-req-note sup { color: #c90500; font-size: 1rem; }

/* Form groups */
.academy-form .form-group { margin-bottom: 2rem; }
.academy-form .field-label { display: block; margin-bottom: 0.7rem; }
.academy-form .q-num { font-family: "Lexend-Bold", sans-serif; font-size: 0.7rem; color: #ffdb0b; letter-spacing: 2px; text-transform: uppercase; display: block; margin-bottom: 0.25rem; }
.academy-form .q-en { font-family: "Lexend-Regular", sans-serif; font-size: 0.92rem; color: #fff; display: block; }
.academy-form .q-ar { font-family: "NotoKufiArabic-Regular", sans-serif; font-size: 0.88rem; color: #aaa; display: block; direction: rtl; text-align: right; margin-top: 2px; }
.academy-form .field-label sup { color: #c90500; font-size: 0.9rem; }

/* Inputs */
.academy-form input[type="text"],
.academy-form input[type="email"],
.academy-form input[type="tel"],
.academy-form input[type="date"],
.academy-form textarea {
    width: 100%;
    background-color: #1e1c1d;
    border: 1px solid #2a2729 !important;
    color: #fff;
    font-family: "Lexend-Regular", sans-serif;
    font-size: 0.88rem;
    padding: 13px 16px;
    border-radius: 4px;
    transition: border-color 0.2s;
    margin-bottom: 0;
}
.academy-form input[type="text"]:focus,
.academy-form input[type="email"]:focus,
.academy-form input[type="tel"]:focus,
.academy-form input[type="date"]:focus,
.academy-form textarea:focus {
    border-color: #ffdb0b !important;
    background-color: #201e1f;
}
.academy-form input[type="date"]::-webkit-calendar-picker-indicator { filter: invert(1); cursor: pointer; }
.academy-form ::placeholder { color: #555; }
.academy-form textarea { resize: vertical; min-height: 150px; line-height: 1.7; }

/* Option lists (radio/checkbox groups) */
.academy-options { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 0.6rem; }
.academy-options li { flex: 0 0 auto; }
.academy-options label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    padding: 9px 16px;
    border: 1px solid #2a2729;
    border-radius: 4px;
    background-color: #1e1c1d;
    transition: border-color 0.2s, background-color 0.2s;
    font-family: "Lexend-Regular", sans-serif;
    font-size: 0.85rem;
    color: #ccc;
    user-select: none;
}
.academy-options label:hover { border-color: #666; color: #fff; }
.academy-options label:has(input:checked) { border-color: #ffdb0b; background-color: #201e1f; color: #ffdb0b; }
.academy-options input[type="radio"],
.academy-options input[type="checkbox"] {
    accent-color: #ffdb0b;
    width: 15px;
    height: 15px;
    flex-shrink: 0;
    margin: 0;
    padding: 0;
    margin-bottom: 0;
    border: none !important;
}

/* Education "Other" field */
#edu-other-wrap { margin-top: 0.65rem; display: none; }

/* Commitment block */
.academy-commitment {
    background-color: #1a1819;
    border: 1px solid #2a2729;
    border-radius: 6px;
    padding: 1.4rem 1.6rem;
}
.academy-commitment p { font-size: 0.88rem; color: #ccc; line-height: 1.75; margin-bottom: 0.6rem; }
.academy-commitment p:last-of-type { margin-bottom: 0; }
.academy-commitment .en-text { font-family: "Lexend-Regular", sans-serif; }
.academy-commitment .ar-text { font-family: "NotoKufiArabic-Regular", sans-serif; direction: rtl; text-align: right; line-height: 1.95; }
.academy-commitment .confirm-row {
    display: flex;
    align-items: flex-start;
    gap: 0.7rem;
    margin-top: 1.1rem;
    padding-top: 1rem;
    border-top: 1px solid #2a2729;
}
.academy-commitment .confirm-row input[type="checkbox"] {
    accent-color: #ffdb0b;
    width: 17px;
    height: 17px;
    flex-shrink: 0;
    margin-top: 2px;
    margin-bottom: 0;
    border: none !important;
}
.academy-commitment .confirm-row label {
    font-family: "Lexend-Regular", sans-serif;
    font-size: 0.85rem;
    color: #ccc;
    line-height: 1.6;
    cursor: pointer;
}

/* Motivation sub-labels */
.motivation-hint { font-size: 0.83rem; color: #888; line-height: 1.65; margin-bottom: 0.5rem; }
.motivation-hint.en-hint { font-family: "Lexend-Regular", sans-serif; }
.motivation-hint.ar-hint { font-family: "NotoKufiArabic-Regular", sans-serif; direction: rtl; text-align: right; line-height: 1.85; }

/* Word counter */
.word-counter { text-align: right; font-family: "Lexend-Regular", sans-serif; font-size: 0.73rem; color: #777; margin-top: 5px; }
.word-counter.over-limit { color: #c90500; }

/* Submit area */
.academy-submit-wrap { margin-top: 2.5rem; text-align: center; }
.academy-submit-btn {
    background-color: #ffdb0b;
    color: #141213;
    font-family: "Lexend-Bold", sans-serif;
    font-size: 0.88rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    border: none;
    padding: 15px 44px;
    border-radius: 4px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: background-color 0.2s, transform 0.15s;
}
.academy-submit-btn:hover { background-color: #fff; transform: translateY(-2px); }
.academy-submit-note { margin-top: 0.7rem; font-family: "NotoKufiArabic-Regular", sans-serif; font-size: 0.78rem; color: #777; direction: rtl; }

/* Alerts */
.academy-alert { padding: 1.2rem 1.5rem; border-radius: 5px; margin-bottom: 2rem; font-size: 0.88rem; line-height: 1.65; }
.academy-alert.is-error {
    background-color: rgba(201,5,0,.1);
    border: 1px solid #c90500;
    color: #ff7070;
    font-family: "Lexend-Regular", sans-serif;
}
.academy-alert.is-success {
    background-color: rgba(255,219,11,.06);
    border: 1px solid #ffdb0b;
    padding: 2.5rem 2rem;
    text-align: center;
}
.academy-success-icon { font-size: 2.8rem; display: block; margin-bottom: 1rem; color: #ffdb0b; }
.academy-alert.is-success h3 { margin: 0 0 1.25rem; line-height: 1.3; }
.academy-alert.is-success h3 .en-bold { display: block; color: #ffdb0b; font-size: clamp(1.1rem,2.5vw,1.5rem); }
.academy-alert.is-success h3 .ar-bold { display: block; color: #fff; font-size: clamp(0.95rem,2vw,1.2rem); margin-top: 0.4rem; }
.academy-alert.is-success .en-text { font-family: "Lexend-Regular", sans-serif; color: #ccc; margin-bottom: 0.5rem; font-size: 0.88rem; line-height: 1.8; }
.academy-alert.is-success .ar-text { font-family: "NotoKufiArabic-Regular", sans-serif; color: #ccc; font-size: 0.88rem; direction: rtl; line-height: 1.95; }

/* Responsive */
@media (max-width: 991px) {
    .academy-lang-block { margin-bottom: 1rem; }
}
@media (max-width: 767px) {
    .academy-title-pill { padding: 1.2rem 2rem; border-radius: 80px; }
    .academy-lang-block { padding: 1.4rem 1.25rem; }
    .academy-options { flex-direction: column; }
    .academy-options li { width: 100%; }
    .academy-options label { width: 100%; }
    .academy-submit-btn { width: 100%; justify-content: center; padding: 14px 24px; }
}
/* Per-field validation error messages */
.field-error {
    display: none;
    font-family: "Lexend-Regular", sans-serif;
    font-size: 0.73rem;
    color: #ff5f5f;
    margin-top: 5px;
    line-height: 1.4;
}
.field-error.visible { display: block; }
.academy-form input.is-invalid,
.academy-form textarea.is-invalid { border-color: #c90500 !important; background-color: #1e1216 !important; }
.academy-options.is-invalid label { border-color: #c90500; }
.academy-commitment.is-invalid { border-color: #c90500 !important; }
.academy-submit-btn:disabled { opacity: 0.55; cursor: not-allowed; transform: none; pointer-events: none; }
.btn-spinner { display:inline-block; width:14px; height:14px; border:2px solid #141213; border-top-color:transparent; border-radius:50%; animation:spin .7s linear infinite; }
@keyframes spin { to { transform:rotate(360deg); } }
</style>
    <?php
}, 20 );

get_header();
?>

<div class="polyblog-academy-page">

    <!-- ═══ Program Description ════════════════════════════════════════════ -->
    <section class="py-0">
        <div class="container">
            test

            <!-- Desktop top white line -->
            <div class="row pt-2 mb-4 d-lg-flex d-none">
                <div class="col-12"><div class="academy-white-line"></div></div>
            </div>

            <!-- Page title -->
            <div class="row">
                <div class="col-12 academy-title-block">
                    <div class="academy-title-pill">
                        <h1>
                            <span class="en-bold">PolyBlog Academy</span>
                            <span class="ar-bold">أكاديمية بوليبلوغ</span>
                        </h1>
                    </div>
                    <div class="academy-partner-badge">
                        <span>In collaboration with Konrad Adenauer Stiftung (KAS) &nbsp;·&nbsp; بالتعاون مع مؤسسة كونراد أديناور</span>
                    </div>
                </div>
            </div>

            <!-- Bilingual program description -->
            <div class="row academy-description g-3">
                <div class="col-lg-6 col-12">
                    <div class="academy-lang-block en-block">
                        <p><strong>PolyBlog</strong>, in collaboration with the <strong>Konrad Adenauer Stiftung (KAS)</strong>, is launching an intensive workshop and internship program as part of a digital journalism training initiative designed to equip 25 aspiring young journalists from across Lebanon with the skills, practical experience, and professional network needed to build careers in independent media.</p>
                        <p>The program combines intensive workshops covering digital journalism, investigative reporting, fact-checking, political analysis, multimedia storytelling, media ethics, and professional development, followed by an eight-week internship at PolyBlog for selected participants.</p>
                        <p>By addressing the gap between academic education and the realities of modern journalism, the initiative aims to strengthen independent media, promote evidence-based reporting, and contribute to a more informed, engaged, and democratic public discourse in Lebanon.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="academy-lang-block ar-block">
                        <p>تُطلق <strong>بوليبلوغ</strong>، بالتعاون مع <strong>مؤسسة كونراد أديناور (KAS)</strong>، برنامجاً مكثفاً للتدريب وورش العمل في إطار مبادرة متخصصة في الصحافة الرقمية، تهدف إلى تزويد 25 صحفياً وصحفية من الشباب من مختلف المناطق اللبنانية بالمهارات والخبرة العملية وشبكة العلاقات المهنية اللازمة لبناء مسيرة مهنية في مجال الإعلام المستقل.</p>
                        <p>يجمع البرنامج بين ورش عمل مكثفة تغطي الصحافة الرقمية، والصحافة الاستقصائية، والتحقق من المعلومات، والتحليل السياسي، وسرد القصص متعدد الوسائط، وأخلاقيات الإعلام، والتطوير المهني، تليها فترة تدريب عملي لمدة ثمانية أسابيع في منصة <strong>بوليبلوغ</strong> للمشاركين الذين سيتم اختيارهم.</p>
                        <p>ومن خلال ردم الفجوة بين التعليم الأكاديمي ومتطلبات العمل الصحفي المعاصر، تسعى المبادرة إلى تعزيز الإعلام المستقل، وتشجيع الصحافة القائمة على الأدلة، والإسهام في بناء نقاش عام أكثر وعياً وتفاعلاً وديمقراطية في لبنان.</p>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <!-- ═══ Application Form ════════════════════════════════════════════════ -->
    <section class="academy-form-section pb-5">
        <div class="container">
            <hr class="academy-divider">

            <!-- Form heading -->
            <div class="row">
                <div class="col-12">
                    <div class="academy-form-title">
                        <h2>
                            <span class="en-bold">Application Form</span>
                            <span class="ar-bold">استمارة التقديم</span>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- ✓ Success state – revealed by JS after AJAX -->
            <div class="row" id="academy-success-state" style="display:none;">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="academy-alert is-success">
                        <span class="academy-success-icon">&#10003;</span>
                        <h3>
                            <span class="en-bold">Application Received!</span>
                            <span class="ar-bold">تم استلام طلبك!</span>
                        </h3>
                        <p class="en-text">Thank you for applying to the PolyBlog Academy Digital Journalism Program. A confirmation email has been sent to your inbox. Our team will review all applications and contact shortlisted candidates directly.</p>
                        <p class="ar-text">شكراً لتقديمك إلى برنامج أكاديمية بوليبلوغ للصحافة الرقمية. تم إرسال رسالة تأكيد إلى بريدك الإلكتروني. سيقوم فريقنا بمراجعة الطلبات والتواصل مع المرشحين المختارين مباشرةً.</p>
                    </div>
                </div>
            </div>

            <div class="row" id="academy-form-row">
                <div class="col-lg-8 col-12 mx-auto">
                    <form method="POST" class="academy-form" id="academy-application-form" novalidate>
                        <?php wp_nonce_field( 'polyblog_academy_form', 'academy_nonce' ); ?>
                        <span class="academy-req-note"><sup>*</sup> Required / مطلوب</span>

                        <!-- ── 1. Full Name ──────────────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="full_name">
                                <span class="q-num">01</span>
                                <span class="q-en">Full Name <sup>*</sup></span>
                                <span class="q-ar">الاسم الكامل <sup>*</sup></span>
                            </label>
                            <input type="text" id="full_name" name="full_name" required autocomplete="name"
                                   placeholder="Enter your full name · أدخل اسمك الكامل">
                            <span class="field-error" id="error-full_name"></span>
                        </div>

                        <!-- ── 2. Date of Birth ──────────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="dob">
                                <span class="q-num">02</span>
                                <span class="q-en">Date of Birth <sup>*</sup></span>
                                <span class="q-ar">تاريخ الولادة <sup>*</sup></span>
                            </label>
                            <input type="date" id="dob" name="dob" required>
                            <span class="field-error" id="error-dob"></span>
                        </div>

                        <!-- ── 3. Gender ─────────────────────────────────── -->
                        <div class="form-group">
                            <span class="field-label">
                                <span class="q-num">03</span>
                                <span class="q-en">Gender <sup>*</sup></span>
                                <span class="q-ar">الجنس <sup>*</sup></span>
                            </span>
                            <ul class="academy-options" data-group="gender">
                                <li>
                                    <label>
                                        <input type="radio" name="gender" value="Male / ذكر" required>
                                        <span>Male / ذكر</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="gender" value="Female / أنثى">
                                        <span>Female / أنثى</span>
                                    </label>
                                </li>
                            </ul>
                            <span class="field-error" id="error-gender"></span>
                        </div>

                        <!-- ── 4. Place of Residence ────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="residence">
                                <span class="q-num">04</span>
                                <span class="q-en">Place of Residence <sup>*</sup></span>
                                <span class="q-ar">مكان السكن <sup>*</sup></span>
                            </label>
                            <input type="text" id="residence" name="residence" required
                                   placeholder="City / District · المدينة / المنطقة">
                            <span class="field-error" id="error-residence"></span>
                        </div>

                        <!-- ── 5. Education Level ────────────────────────── -->
                        <div class="form-group">
                            <span class="field-label">
                                <span class="q-num">05</span>
                                <span class="q-en">Education Level <sup>*</sup></span>
                                <span class="q-ar">المستوى التعليمي <sup>*</sup></span>
                            </span>
                            <?php
                            $edu_options = [
                                'high_school' => 'High School / ثانوي',
                                'technical'   => 'Technical Institute / معهد تقني',
                                'bachelor'    => "Bachelor's Degree / إجازة جامعية",
                                'master'      => "Master's Degree / ماجستير",
                                'phd'         => 'PhD / دكتوراه',
                                'other'       => 'Other / غيره',
                            ];
                            ?>
                            <ul class="academy-options" data-group="education">
                                <?php foreach ( $edu_options as $val => $label ) : ?>
                                <li>
                                    <label>
                                        <input type="radio" name="education" value="<?php echo esc_attr( $val ); ?>"
                                               class="edu-radio" required>
                                        <span><?php echo esc_html( $label ); ?></span>
                                    </label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <span class="field-error" id="error-education"></span>
                            <div id="edu-other-wrap">
                                <input type="text" id="edu_other" name="edu_other"
                                       placeholder="Please specify / يرجى التحديد">
                                <span class="field-error" id="error-edu_other"></span>
                            </div>
                        </div>

                        <!-- ── 6. Field of Study ────────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="field_of_study">
                                <span class="q-num">06</span>
                                <span class="q-en">Field of Study (Major) <sup>*</sup></span>
                                <span class="q-ar">الاختصاص <sup>*</sup></span>
                            </label>
                            <input type="text" id="field_of_study" name="field_of_study" required
                                   placeholder="e.g. Journalism, Political Science · مثلاً: صحافة، علوم سياسية">
                            <span class="field-error" id="error-field_of_study"></span>
                        </div>

                        <!-- ── 7. Current Occupation ─────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="occupation">
                                <span class="q-num">07</span>
                                <span class="q-en">Current Occupation / Profession <sup>*</sup></span>
                                <span class="q-ar">الوظيفة الحالية / المهنة <sup>*</sup></span>
                            </label>
                            <input type="text" id="occupation" name="occupation" required
                                   placeholder="e.g. Student, Journalist, Freelancer · مثلاً: طالب، صحفي، مستقل">
                            <span class="field-error" id="error-occupation"></span>
                        </div>

                        <!-- ── 8. Mobile Number ──────────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="mobile">
                                <span class="q-num">08</span>
                                <span class="q-en">Mobile Number <sup>*</sup></span>
                                <span class="q-ar">رقم الهاتف <sup>*</sup></span>
                            </label>
                            <input type="tel" id="mobile" name="mobile" required autocomplete="tel"
                                   placeholder="+961 XX XXX XXX">
                            <span class="field-error" id="error-mobile"></span>
                        </div>

                        <!-- ── 9. Email Address ──────────────────────────── -->
                        <div class="form-group">
                            <label class="field-label" for="applicant_email">
                                <span class="q-num">09</span>
                                <span class="q-en">Email Address <sup>*</sup></span>
                                <span class="q-ar">البريد الإلكتروني <sup>*</sup></span>
                            </label>
                            <input type="email" id="applicant_email" name="applicant_email" required autocomplete="email"
                                   placeholder="your@email.com">
                            <span class="field-error" id="error-applicant_email"></span>
                        </div>

                        <!-- ── 10. Commitment ────────────────────────────── -->
                        <div class="form-group">
                            <span class="field-label">
                                <span class="q-num">10</span>
                                <span class="q-en">Commitment <sup>*</sup></span>
                                <span class="q-ar">الالتزام <sup>*</sup></span>
                            </span>
                            <div class="academy-commitment">
                                <p class="en-text">I confirm my commitment to attend the full training program and, if selected, to actively participate in the internship program and fulfill its requirements.</p>
                                <p class="ar-text">أؤكد التزامي بحضور البرنامج التدريبي كاملاً، وفي حال تم اختياري، ألتزم بالمشاركة في برنامج التدريب العملي واستيفاء متطلباته.</p>
                                <div class="confirm-row">
                                    <input type="checkbox" id="commitment" name="commitment" required>
                                    <label for="commitment">I confirm and agree / أؤكد وأوافق</label>
                                </div>
                                <span class="field-error" id="error-commitment"></span>
                            </div>
                        </div>

                        <!-- ── 11. Motivation & Expectations ───────────── -->
                        <div class="form-group">
                            <label class="field-label" for="motivation">
                                <span class="q-num">11</span>
                                <span class="q-en">Motivation &amp; Expectations <sup>*</sup></span>
                                <span class="q-ar">الدافع والتوقعات <sup>*</sup></span>
                            </label>
                            <p class="motivation-hint en-hint">Please tell us why you would like to join the PolyBlog Academy Digital Journalism Program. What motivates you to apply, and what do you hope to gain from the training sessions and internship? <em>(Maximum 250 words)</em></p>
                            <p class="motivation-hint ar-hint">يرجى إخبارنا لماذا ترغب/ترغبين في الانضمام إلى برنامج أكاديمية بوليبلوغ للصحافة الرقمية. ما الذي يدفعك للتقديم، وما الذي تتوقع/ين اكتسابه من الجلسات التدريبية وبرنامج التدريب العملي؟ <em>(250 كلمة كحدّ أقصى)</em></p>
                            <textarea id="motivation" name="motivation" required
                                      placeholder="Write your response here… · اكتب إجابتك هنا…"></textarea>
                            <div class="word-counter" id="word-counter">0 / 250 words</div>
                            <span class="field-error" id="error-motivation"></span>
                        </div>

                        <!-- ── Submit ────────────────────────────────────── -->
                        <div class="academy-submit-wrap">
                            <button type="submit" class="academy-submit-btn">
                                <span>Submit Application</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </button>
                            <p class="academy-submit-note">إرسال الطلب</p>
                        </div>

                    </form>
                </div>
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>

</div><!-- /.polyblog-academy-page -->

<script>
(function () {
    'use strict';

    var form       = document.getElementById('academy-application-form');
    var formRow    = document.getElementById('academy-form-row');
    var successRow = document.getElementById('academy-success-state');
    var ta         = document.getElementById('motivation');
    var counter    = document.getElementById('word-counter');

    // ── Education "Other" toggle ─────────────────────────────────────────
    document.querySelectorAll('.edu-radio').forEach(function (r) {
        r.addEventListener('change', function () {
            var wrap = document.getElementById('edu-other-wrap');
            if (wrap) wrap.style.display = this.value === 'other' ? 'block' : 'none';
        });
    });

    // ── Word counter ─────────────────────────────────────────────────────
    function countWords(str) {
        return str.trim() === '' ? 0 : str.trim().split(/\s+/).length;
    }
    function updateCount() {
        if (!ta || !counter) return;
        var w = countWords(ta.value);
        counter.textContent = w + ' / 250 words';
        counter.classList.toggle('over-limit', w > 250);
    }
    if (ta) { ta.addEventListener('input', updateCount); updateCount(); }

    // ── Per-field error helpers ──────────────────────────────────────────
    function clearErrors() {
        form.querySelectorAll('.field-error').forEach(function (el) {
            el.textContent = '';
            el.classList.remove('visible');
        });
        form.querySelectorAll('.is-invalid').forEach(function (el) {
            el.classList.remove('is-invalid');
        });
    }

    function showError(fieldId, msg) {
        var errEl = document.getElementById('error-' + fieldId);
        if (errEl) {
            errEl.textContent = msg;
            errEl.classList.add('visible');
        }
        // Highlight the offending control
        var input = form.querySelector('#' + fieldId);
        if (input) {
            input.classList.add('is-invalid');
        }
        // For radio groups, highlight every option label border via the list
        var group = form.querySelector('.academy-options[data-group="' + fieldId + '"]');
        if (group) group.classList.add('is-invalid');
        // For commitment
        if (fieldId === 'commitment') {
            var block = form.querySelector('.academy-commitment');
            if (block) block.classList.add('is-invalid');
        }
    }

    // ── Client-side validation ───────────────────────────────────────────
    function validate() {
        var errs = {};

        var fn = form.querySelector('#full_name');
        if (!fn || !fn.value.trim()) errs['full_name'] = 'Full Name is required. / الاسم مطلوب.';

        var dob = form.querySelector('#dob');
        if (!dob || !dob.value) errs['dob'] = 'Date of Birth is required. / تاريخ الولادة مطلوب.';

        if (!form.querySelector('input[name="gender"]:checked'))
            errs['gender'] = 'Please select your gender. / يرجى تحديد الجنس.';

        var res = form.querySelector('#residence');
        if (!res || !res.value.trim()) errs['residence'] = 'Place of Residence is required. / مكان السكن مطلوب.';

        var eduChecked = form.querySelector('input[name="education"]:checked');
        if (!eduChecked) {
            errs['education'] = 'Please select your education level. / يرجى تحديد المستوى التعليمي.';
        } else if (eduChecked.value === 'other') {
            var eduOther = form.querySelector('#edu_other');
            if (!eduOther || !eduOther.value.trim())
                errs['edu_other'] = 'Please specify your education. / يرجى التحديد.';
        }

        var fos = form.querySelector('#field_of_study');
        if (!fos || !fos.value.trim()) errs['field_of_study'] = 'Field of Study is required. / الاختصاص مطلوب.';

        var occ = form.querySelector('#occupation');
        if (!occ || !occ.value.trim()) errs['occupation'] = 'Occupation is required. / المهنة مطلوبة.';

        var mob = form.querySelector('#mobile');
        if (!mob || !mob.value.trim()) errs['mobile'] = 'Mobile Number is required. / رقم الهاتف مطلوب.';

        var email = form.querySelector('#applicant_email');
        if (!email || !email.value.trim()) {
            errs['applicant_email'] = 'Email Address is required. / البريد مطلوب.';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
            errs['applicant_email'] = 'Please enter a valid email. / بريد غير صحيح.';
        }

        var cb = form.querySelector('#commitment');
        if (!cb || !cb.checked) errs['commitment'] = 'Please confirm your commitment. / يرجى التأكيد.';

        if (!ta || !ta.value.trim()) {
            errs['motivation'] = 'Motivation is required. / الدافع مطلوب.';
        } else if (countWords(ta.value) > 250) {
            errs['motivation'] = 'Exceeds 250 words (current: ' + countWords(ta.value) + ').';
        }

        return errs;
    }

    // ── Apply errors and scroll to first ────────────────────────────────
    function applyErrors(errs) {
        clearErrors();
        var firstEl = null;
        Object.keys(errs).forEach(function (key) {
            showError(key, errs[key]);
            if (!firstEl) {
                firstEl = document.getElementById('error-' + key)
                       || form.querySelector('#' + key)
                       || form.querySelector('.academy-options[data-group="' + key + '"]');
            }
        });
        if (firstEl) {
            var top = firstEl.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    }

    // ── Submit handler ───────────────────────────────────────────────────
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var errs = validate();
        if (Object.keys(errs).length > 0) {
            applyErrors(errs);
            return;
        }

        clearErrors();

        // Button loading state
        var btn      = form.querySelector('.academy-submit-btn');
        var btnLabel = btn.querySelector('span');
        var btnOrig  = btnLabel ? btnLabel.textContent : 'Submit Application';
        btn.disabled = true;
        if (btnLabel) btnLabel.textContent = 'Sending…';
        btn.insertAdjacentHTML('beforeend', '<span class="btn-spinner"></span>');

        // Build FormData and flag as AJAX
        var fd = new FormData(form);
        fd.append('is_ajax', '1');

        fetch(window.location.href, {
            method: 'POST',
            body: fd,
            credentials: 'same-origin'
        })
        .then(function (r) {
            if (!r.ok) throw new Error('Network error ' + r.status);
            return r.json();
        })
        .then(function (data) {
            if (data.success) {
                // Show success, hide form
                if (formRow)    formRow.style.display    = 'none';
                if (successRow) {
                    successRow.style.display = 'block';
                    var top = successRow.getBoundingClientRect().top + window.pageYOffset - 80;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
            } else {
                // Server returned per-field errors
                var spinner = btn.querySelector('.btn-spinner');
                if (spinner) spinner.remove();
                btn.disabled = false;
                if (btnLabel) btnLabel.textContent = btnOrig;

                if (data.data && data.data.fields) {
                    applyErrors(data.data.fields);
                } else {
                    var msg = (data.data && data.data.message) || 'Submission failed. Please try again.';
                    var firstErr = form.querySelector('.field-error');
                    if (firstErr) { firstErr.textContent = msg; firstErr.classList.add('visible'); }
                }
            }
        })
        .catch(function () {
            var spinner = btn.querySelector('.btn-spinner');
            if (spinner) spinner.remove();
            btn.disabled = false;
            if (btnLabel) btnLabel.textContent = btnOrig;
            // Show a generic error on the motivation field as a fallback
            var gen = document.getElementById('error-motivation');
            if (gen) { gen.textContent = 'Network error. Please check your connection and try again.'; gen.classList.add('visible'); }
        });
    });

    // ── Clear field error on user interaction ────────────────────────────
    form.querySelectorAll('input, textarea').forEach(function (el) {
        el.addEventListener('input', function () {
            var errEl = document.getElementById('error-' + el.id);
            if (errEl) { errEl.textContent = ''; errEl.classList.remove('visible'); }
            el.classList.remove('is-invalid');
        });
        if (el.type === 'radio' || el.type === 'checkbox') {
            el.addEventListener('change', function () {
                var groupName = el.getAttribute('name');
                var errEl = document.getElementById('error-' + groupName)
                         || document.getElementById('error-' + el.id);
                if (errEl) { errEl.textContent = ''; errEl.classList.remove('visible'); }
                var group = form.querySelector('.academy-options[data-group="' + groupName + '"]');
                if (group) group.classList.remove('is-invalid');
                var block = form.querySelector('.academy-commitment');
                if (block) block.classList.remove('is-invalid');
            });
        }
    });
})();
</script>

<?php get_footer(); ?>
