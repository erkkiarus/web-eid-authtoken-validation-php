<?php

/*
 * Copyright (c) 2022-2023 Estonian Information System Authority
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace web_eid\web_eid_authtoken_validation_php\validator\certvalidators;

use PHPUnit\Framework\TestCase;
use web_eid\web_eid_authtoken_validation_php\testutil\Certificates;
use web_eid\web_eid_authtoken_validation_php\exceptions\UserCertificateDisallowedPolicyException;
use web_eid\web_eid_authtoken_validation_php\testutil\Logger;

class SubjectCertificatePolicyValidatorTest extends TestCase
{
    public function testWhenDisallowedPolicyExist(): void
    {

        $this->expectException(UserCertificateDisallowedPolicyException::class);
        $this->expectExceptionMessage("Disallowed user certificate policy");

        $cert = Certificates::getJaakKristjanEsteid2018Cert();
        $validator = new SubjectCertificatePolicyValidator(["1.3.6.1.4.1.51361.1.2.1"], new Logger());
        $validator->validate($cert);
    }

    public function testWhenDisallowedPolicyNotExist(): void
    {
        $cert = Certificates::getJaakKristjanEsteid2018Cert();
        $validator = new SubjectCertificatePolicyValidator(["1.3.6.1.4.1.2.1.2.1"], new Logger());
        $this->assertNull($validator->validate($cert));
    }
}
