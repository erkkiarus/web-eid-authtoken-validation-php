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

namespace web_eid\web_eid_authtoken_validation_php\validator\ocsp\service;

use web_eid\web_eid_authtoken_validation_php\util\TrustedCertificates;
use web_eid\web_eid_authtoken_validation_php\util\UriCollection;

class AiaOcspServiceConfiguration
{
    private UriCollection $nonceDisabledOcspUrls;
    private TrustedCertificates $trustedCACertificates;

    public function __construct(UriCollection $nonceDisabledOcspUrls, TrustedCertificates $trustedCACertificates)
    {
        $this->nonceDisabledOcspUrls = $nonceDisabledOcspUrls;
        $this->trustedCACertificates = $trustedCACertificates;
    }

    public function getNonceDisabledOcspUrls()
    {
        return $this->nonceDisabledOcspUrls;
    }

    public function getTrustedCACertificates()
    {
        return $this->trustedCACertificates;
    }
}
